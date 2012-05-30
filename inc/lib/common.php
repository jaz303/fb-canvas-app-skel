<?php
function redirect_to($url) {
  session_write_close();
  header("Location: $url");
}

function redirect_to_facebook_app() {
  redirect_to(url_for_facebook_app());
}

function url_for_facebook_app() {
  
}

function url_for_app($page = '') {
  
}

//
// Templating

function display() {
  
}
?>