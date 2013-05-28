function share() {
   FB.getLoginStatus(function(response) {
     if (response.status === 'connected') {
       var res = FB.ui({
           method: 'feed',
           name: "Share Name",
           link: 'http://localhost/#',
           picture: '',
           caption: "Share text...",
           description: "Share description..."
       });
     }
   });
 }

window.onFacebookReady = function() {
  
};

$(function() {
  
});