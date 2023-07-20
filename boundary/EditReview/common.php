<?php
function load_html($file){
  $dom = new DOMDocument();
  $dom->loadHTMLFile($file);
  return simplexml_import_dom($dom);
  }
?>
