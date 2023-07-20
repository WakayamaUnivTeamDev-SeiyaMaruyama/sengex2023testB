<?php
class Subject {
  public $titles = array('','インターネット技術', '情報システム基盤技術', 'ウェブデザイン演習', 'プログラミング言語');

  public function getTitle($id) {
    return $this->titles[$id];
  }
}
?>
