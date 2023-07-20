<?php
class SubjectListCtrl {
  public function showList() {
    $stu = new Student();
    $sbj = new Subject();
    $doc = load_html('SubjectList.html');
    $s = $doc->xpath('//ul[@id="subjects"]');
    foreach($stu->subjects() as $id){
      $li = $s[0]->addChild('li');
      $a = $li->addChild('a', $sbj->getTitle($id));
      if($stu->getReviewText($id) === null){
	$a->addAttribute('href', "SubjectListCtrl.php?method=new&id=$id");
      }else{
	$a->addAttribute('href', "SubjectListCtrl.php?method=show&id=$id");
	$li->addChild('span', 'レビューあり')->addAttribute('class', 'mark');
      }
    }
    echo $doc->asXML();
  }
  public function show($id) {
    $src = new ShowReviewCtrl();
    $src->show($id);
  }
  public function _new($id) {
    $erc = new EditReviewCtrl();
    $erc->_new($id);
  }
}
?>
