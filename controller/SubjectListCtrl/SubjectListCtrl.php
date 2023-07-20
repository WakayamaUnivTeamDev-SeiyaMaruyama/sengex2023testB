<?php
ini_set("display_errors", 1);
require_once("common.php");
require_once("Student.php");
require_once("Subject.php");
require_once("SubjectListCtrlClass.php");
require_once("ShowReviewCtrlClass.php");
require_once("EditReviewCtrlClass.php");

header('content-type: text/html; charset=utf-8');

$ctl = new SubjectListCtrl();
if($_GET['method'] === 'showList') {
  $ctl->showList();
} else if($_GET['method'] === 'show') {
  $ctl->show($_GET['id']);
} else if($_GET['method'] === 'new') {
  $ctl->_new($_GET['id']);
}
exit();
?>
