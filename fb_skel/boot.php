<?php
//
// Facebook App configuration

define('FB_APP_ID',               '');
define('FB_SECRET',               '');
define('FB_APP_NAMESPACE',        '');
define('FB_APP_URL_PREFIX',       '/app/');

define('APP_TITLE',               '');

//
// Env

if ($_SERVER['HTTP_PORT'] == 80) {
  define('ENVIRONMENT', 'production');
} else {
  define('ENVIRONMENT', 'development');
}

//
// Skeleton configuration

define('OFFSITE_ROOT',            dirname(__FILE__));
define('LIB_ROOT',                OFFSITE_ROOT . '/lib');
define('TPL_DIR',                 'tpl');
define('TPL_ROOT',                OFFSITE_ROOT . '/' . TPL_DIR);
define('PROTOCOL',                (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http")

set_include_path('.:' . LIB_ROOT);

require 'common.php';
require 'facebook-php-sdk/src/facebook.php';

require dirname(OFFSITE_ROOT . '/' . ENVIRONMENT . '.php');

//
//

if (isset($_REQUEST['error'])) {
    die("Error detected");
}

if (is_post()) {
    if ($request = fb()->getSignedRequest()) {
        if (isset($request['user_id']) && isset($request['oauth_token'])) {
            $_SESSION['FB_ACCESS_TOKEN'] = $request['oauth_token'];
            $_SESSION['FB_USER_ID'] = fb()->getUser();
        } else {
            $_SESSION['FB_ACCESS_TOKEN'] = null;
            $_SESSION['FB_USER_ID'] = null;
            display(':redirect_to_auth.php');
            die();
        }
    }
}

if (!$_SESSION['FB_ACCESS_TOKEN'] || !$_SESSION['FB_USER_ID']) {
    die('No user!');
}

fb()->setAccessToken($_SESSION['FB_ACCESS_TOKEN']);

//
//

header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
session_start();
?>