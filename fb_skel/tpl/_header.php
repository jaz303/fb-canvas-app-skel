<!DOCTYPE html>

<html>
  <head>
    <title>Magners Fridays</title>
    <link rel="stylesheet" href="<?= url_for_stylesheet('main.css') ?>">
    <script type="text/javascript" src="<?= url_for_javascript('jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?= url_for_javascript('app.js') ?>"></script>
  </head>
  <body>
    <div id="fb-root"></div>
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '<?= FB_APP_ID ?>',
          channelUrl : '<?= json_encode(absolute_url(url_for_app('channel.php'))) ?>',
          status     : true, // check login status
          cookie     : false, // enable cookies to allow the server to access the session
          xfbml      : true  // parse XFBML
        });
        
        if (typeof window.onFacebookReady == 'function') {
          window.onFacebookReady();
        }
      };
      
      (function(d){
         var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement('script'); js.id = id; js.async = true;
         js.src = "//connect.facebook.net/en_US/all.js";
         ref.parentNode.insertBefore(js, ref);
       }(document));
    </script>
    <div id='container'>
