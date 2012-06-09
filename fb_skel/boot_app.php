<?php
require dirname(__FILE__) . '/boot.php';
require 'app.php';

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
            display(':redirect_to_auth');
            die();
        }
    }
}

if (empty($_SESSION['FB_ACCESS_TOKEN']) || empty($_SESSION['FB_USER_ID'])) {
    die('No user!');
}

fb()->setAccessToken($_SESSION['FB_ACCESS_TOKEN']);
?>