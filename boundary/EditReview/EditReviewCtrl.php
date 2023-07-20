<?php
require_once("common.php");

header('content-type: text/html; charset=utf-8');

class EditReviewCtrl {
  public function __construct() {
    $doc = load_html("EditReview.html");
    $sbj = $doc->xpath('//span[@id="subject"]');
    $sbj[0]->{0} = 'サンプル科目名';
    $txt = $doc->xpath('//textarea[@name="text"]');
    $txt[0]->{0} = 'サンプルレビュー';
    $id = $doc->xpath('//input[@name="id"]');
    $id[0]->addAttribute('value', '0123');
    echo $doc->asXML();
  }
  public function save($id, $text) {
    echo "<div>save: $id, $text</div>";
  }
  public function cancel(){
    echo "<div>cancel</div>";
  }
}

$ctl = new EditReviewCtrl();
if($_GET['method'] === 'save') {
  $ctl->save($_POST['id'], $_POST['text']);
} else if($_GET['method'] === 'cancel') {
  $ctl->cancel();
}
exit();
?>
