function share() {
   FB.getLoginStatus(function(response) {
     if (response.status === 'connected') {
       var res = FB.ui({
           method: 'feed',
           name: "Fancy a pint? Have one on us.",
           link: 'http://apps.facebook.com/magners_fridays/',
           picture: 'https://magnersfridays.com/app/images/share-icon.png',
           caption: "Each Friday we'll be offering you the chance to claim a free pint of Magners Original Cider to enjoy in participating bars around Northern Ireland!",
           description: "(Terms and Conditions apply)"
       });
     }
   });
 }

window.onFacebookReady = function() {
  
};

$(function() {
  
});