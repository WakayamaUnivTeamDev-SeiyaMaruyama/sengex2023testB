<?php
require_once("common.php");

class SubjectListCtrl {
  public function __construct() {
    $doc = load_html('SubjectList.html');
    $sbjs = $doc->xpath('//ul[@id="subjects"]');
    $li = $sbjs[0]->addChild('li');
    $a = $li->addChild('a', 'インターネット技術');
    $a->addAttribute('href', 'SubjectListCtrl.php?method=new&id=0001');
    $li = $sbjs[0]->addChild('li');
    $a = $li->addChild('a', '情報システム基盤技術');
    $a->addAttribute('href', 'SubjectListCtrl.php?method=show&id=0002');
    $li->addChild('span', 'レビューあり')->addAttribute('class', 'mark');
    echo $doc->asXML();
  }
  public function showList() {
    echo "<div>showList</div>";
  }
  public function show($id){
    echo "<div>show: $id</div>";
  }
  public function _new($id){
    echo "<div>new: $id</div>";
  }
}

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
