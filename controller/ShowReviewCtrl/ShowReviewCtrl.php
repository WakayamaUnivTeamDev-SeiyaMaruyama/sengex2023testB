<?php
ini_set("display_errors", 1);
require_once("common.php");
require_once("Subject.php");
require_once("Student.php");
require_once("EditReviewCtrl.php");
require_once("SubjectListCtrl.php");

class ShowReviewCtrl {
  public function show($id) {
    $sbj = new Subject();
    $stu = new Student();
    $doc = load_html("ShowReview.html");
    $s = $doc->xpath('//span[@id="subject"]');
    $s[0]->{0} = $sbj->getTitle($id);
    $d = $doc->xpath('//div[@id="review"]');
    $d[0]->{0} = $stu->getReviewText($id);
    $i = $doc->xpath('//input[@name="id"]');
    $i[0]->addAttribute('value', $id);
    echo $doc->asXML();
  }
  public function edit($id) {
    $erc = new EditReviewCtrl();
    $erc->edit($id);
  }
  public function close() {
    $slc = new SubjectListCtrl();
    $slc->showList();
  }	
}

header("Content-Type: text/html; charset=utf-8");

$ctl = new ShowReviewCtrl();
if($_GET['method'] === 'show') {
  $ctl->show($_POST['id']);
} else if($_GET['method'] === 'edit') {
  echo $_POST['id'];
  $ctl->edit($_POST['id']);
} else if($_GET['method'] === 'close') {
  $ctl->close();
}
exit();
?>
