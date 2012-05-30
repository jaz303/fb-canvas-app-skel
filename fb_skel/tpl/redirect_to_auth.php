<html>
  <head>
    <title><?= APP_TITLE ?> :: Authorization Required</title>
  </head>
  <body>
    <script>
      var oauth_url = 'https://www.facebook.com/dialog/oauth/';
      oauth_url += '?client_id=<?= FB_APP_ID ?>';
      oauth_url += '&redirect_uri=' + encodeURIComponent('http://apps.facebook.com/<?= FB_APP_NAMESPACE ?>/');
      window.top.location = oauth_url;
    </script>
  </body>
</script>
