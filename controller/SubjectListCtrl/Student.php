<?php
class Student {
  public function subjects() {
    return array(1,2,3,4);
  }
  public function getReviewText($id) {
    switch($id){
    case 1:
      return "サンプルレビューテキスト1";
    case 3:
      return "サンプルレビューテキスト3";
    default:
      return null;
    }
  }
}
?>
