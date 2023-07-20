<?php
class Subject {
  private $filename = 'titles.txt';
  private $titles = array();
  public function __construct() {
    $lines = file($this->filename);
    foreach ($lines as $l){
      list($id, $title) = explode(',', $l, 2);
      $this->titles[$id] = $title;
    }
  }
  public function getTitle($id) {
    return $this->titles[$id];
  }
}
?>
