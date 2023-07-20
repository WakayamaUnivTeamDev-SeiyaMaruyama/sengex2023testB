<?php
require_once("common.php");

header('content-type: text/html; charset=utf-8');

class ShowReviewCtrl {
  public function __construct() {
    $doc = load_html("ShowReview.html");
    $sbj = $doc->xpath('//span[@id="subject"]');
    $sbj[0]->{0} = 'サンプル科目名';
    $txt = $doc->xpath('//div[@id="text"]');
    $txt[0]->{0} = 'サンプルレビューテキスト';
    $id = $doc->xpath('//input[@name="id"]');
    $id[0]->addAttribute('value', '0123');
    echo $doc->asXML();
  }
  public function edit($id) {
    echo "<div>edit: $id</div>";
  }
  public function close(){
    echo "<div>close</div>";
  }
}

$ctl = new ShowReviewCtrl();
if($_GET['method'] === 'edit') {
  $ctl->edit($_POST['id']);
} else if($_GET['method'] === 'close') {
  $ctl->close();
}
exit();
?>
