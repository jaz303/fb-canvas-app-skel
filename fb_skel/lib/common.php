<?php
$GLOBALS['__db'] = null;
$GLOBALS['__fb'] = null;

$_TPL = array();

//
// Facebook

function fb() {
  if ($GLOBALS['__fb'] === null) {
    $GLOBALS['__fb'] = new Facebook(array(
      'appId'       => FB_APP_ID,
      'secret'      => FB_SECRET,
      'cookie'      => false
    ));
  }
  return $GLOBALS['__fb'];
}

function fb_user_id() {
  return $_SESSION['FB_USER_ID'];
}

//
// Database

function db() {
  if ($GLOBALS['__db'] === null) {
    $pdo = new PDO(PDO_DSN, PDO_USERNAME, PDO_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->exec("SET time_zone = '" . date('P') . "'");
    $GLOBALS['__db'] = $pdo;
  }
  return $GLOBALS['__db'];
}

//
// HTTP

function is_post() {
  return $_SERVER['REQUEST_METHOD'] == 'POST';
}

//
// URLs/redirects

function redirect_to($url) {
  $url = absolute_url($url);
  session_write_close();
  header("Location: $url");
}

function redirect_to_facebook_app() {
  redirect_to(url_for_facebook_app());
}

function url_for_facebook_app() {
  return PROTOCOL . '://apps.facebook.com/' . FB_APP_NAMESPACE . '/';
}

function url_for_app($page = '/') {
  return FB_APP_URL_PREFIX . $page;
}

function absolute_url($url) {
  if (!preg_match('/https?:\/\//', $url)) {
    return PROTOCOL . '://' . $_SERVER['HTTP_HOST'] . $url;
  } else {
    return $url;
  }
}

function redirect_to_start() {
  redirect_to(url_for_app('/'));
}

function redirect_to_start_unless_post() {
  if (!is_post()) {
    redirect_to_start();
    die();
  }
}

function url_for_image($image) { return FB_APP_URL_PREFIX . '/images/' . $image; }
function url_for_stylesheet($stylesheet) { return FB_APP_URL_PREFIX . '/stylesheets/' . $stylesheet; }
function url_for_javascript($javascript) { return FB_APP_URL_PREFIX . '/javascripts/' . $javascript; }

function url_for_terms_and_conditions() { return url_for_app('/terms-and-conditions.php'); }

//
// Templating

function h($str) {
  return htmlspecialchars($str);
}

function template_path($template) {
  if ($template === null) {
    return TPL_DIR . '/' . basename($_SERVER['SCRIPT_FILENAME']);
  } else if ($template[0] == ':') {
    return TPL_ROOT . '/' . substr($template, 1) . '.php';
  } else {
    return TPL_DIR . '/' . $template . '.php';
  }
}

function render($__template__ = null) {
  global $_TPL;
  extract($_TPL);
  ob_start();
  require template_path($__template__);
  return ob_get_clean();
}

function display($__template__ = null) {
  global $_TPL;
  extract($_TPL);
  require template_path($__template__);
}

//
// HTML

function share_link($text) {
  return "<a href='#' onclick='share(); return false;'>" . h($text) . "</a>";
}
?>