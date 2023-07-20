<?php
ini_set("display_errors", 1);
header('content-type: text/html; charset=utf-8');

require_once("common.php");
require_once("Subject.php");
require_once("Student.php");
require_once("SubjectListCtrl.php");

class EditReviewCtrl {
  public function _new($id){
    $sbj = new Subject();
    $doc = load_html("EditReview.html");
    $s = $doc->xpath('//span[@id="subject"]');
    $s[0]->{0} = $sbj->getTitle($id);
    $t = $doc->xpath('//textarea[@name="text"]');
    $t[0]->{0} = '';
    $i = $doc->xpath('//input[@name="id"]');
    $i[0]->addAttribute('value', $id);
    echo $doc->asXML();
  }
  public function edit($id){
    $sbj = new Subject();
    $stu = new Student();
    $doc = load_html("EditReview.html");
    $s = $doc->xpath('//span[@id="subject"]');
    $s[0]->{0} = $sbj->getTitle($id);
    $t = $doc->xpath('//textarea[@name="text"]');
    $t[0]->{0} = $stu->getReviewText($id);
    $i = $doc->xpath('//input[@name="id"]');
    $i[0]->addAttribute('value', $id);
    echo $doc->asXML();
  }
  public function save($id, $text) {
    $stu = new Student();
    $slc = new SubjectListCtrl();
    $stu->setReviewText($id, $text);
    $slc->showList();
  }
  public function cancel(){
    $slc = new SubjectListCtrl();
    $slc->showList();
  }
}

$ctl = new EditReviewCtrl();
if($_GET['method'] === 'new') {
  $ctl->_new($_POST['id']);
} else if($_GET['method'] === 'edit') {
  $ctl->edit($_POST['id']);
} else if($_GET['method'] === 'save') {
  $ctl->save($_POST['id'], $_POST['text']);
} else if($_GET['method'] === 'cancel') {
  $ctl->cancel();
}
exit();
?>
