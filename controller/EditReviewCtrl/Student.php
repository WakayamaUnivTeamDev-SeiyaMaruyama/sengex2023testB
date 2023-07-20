<?php
class Student {
  public function getReviewText($id) {
    return "サンプルレビューテキスト";
  }
  public function setReviewText($id, $text) {
    echo "<div>(Student)setReviewText: $id, $text</div>";
  }
}
?>
