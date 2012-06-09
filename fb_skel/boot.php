<?php
date_default_timezone_set("Europe/London");

//
// Facebook App configuration

define('FB_APP_ID',               '');
define('FB_SECRET',               '');
define('FB_APP_NAMESPACE',        '');
define('FB_APP_URL_PREFIX',       '/app');

define('APP_TITLE',               '');

//
// Env

if ($_SERVER['SERVER_PORT'] == 80 || $_SERVER['SERVER_PORT'] == 443) {
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
define('PROTOCOL',                (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http");

set_include_path('.:' . LIB_ROOT);

require 'common.php';
require 'facebook-php-sdk/src/facebook.php';

require OFFSITE_ROOT . '/env/' . ENVIRONMENT . '.php';

header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');
session_start();
?>