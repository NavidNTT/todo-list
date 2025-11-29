<?php
function isajaxrequest() {
   
}

function redirect( $url ) {
  header("location: $url" );
  die();
}

function diepage($msg){
 echo $msg;
 die();
}

function site_url($uri = '') {
  return BASE_URL . $uri;
}

function dd( $var ){
  echo '<pre>';
  var_dump( $var );
  echo'</pre>';
}