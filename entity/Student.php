<?php
class Student {
  private $filename = 'reviews.txt';
  private $subjectlist;
  public function __construct() {
    $this->subjectlist = array(1,2,4,5);
  }
  public function subjects() {
    return $this->subjectlist;
  }
  public function getReviewText($id) {
    $lines = file($this->filename);
    foreach ($lines as $l){
      list($sid, $review) = explode(',', $l, 2);
      if($sid == $id){
	return trim($review);
      }
    }
    return null;
  }
  public function setReviewText($id, $text) {
    $lines = file($this->filename);
    array_unshift($lines, "$id,$text\n");
    $fp = fopen($this->filename, "w");
    foreach ($lines as $l){
      fputs($fp, $l);
    }
    fclose($fp);
  }
}
?>
