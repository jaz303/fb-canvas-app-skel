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

function request() {
  FB.getLoginStatus(function(response) {
    if (response.status === 'connected') {
      var res = FB.ui({
        method: 'apprequests',
        title: 'Request tile here...',
        message: 'Request text here...'
      }, function(response) {
        
      });
    }
  })
}

window.onFacebookReady = function() {
  
};

$(function() {
  
});