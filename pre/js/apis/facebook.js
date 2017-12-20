$.fn.facebook_login = function() {

	var _this = $(this);

	_this.each(function(i,btn) {
		$(btn).addClass('active').click(function() {
		    FB.login(function(response) {
		      if (response.authResponse) {
		        
		      	var loading = $(btn).loading(btn);

				$.ajax({
				  type:'POST',
				  url:App.config.url+'facebook_login',
				  data:response,
				  success:function(data){ 
				  	location.reload();				  
				  },
				  error:function(){
				    loading.end();
				    console.dir('Error JSON');
				  },
				  dataType:'json'
				});

		      } else {
		        console.error('User cancelled login or did not fully authorize.');
		      }
		    }, {
			    scope: 'public_profile,email', 
			    return_scopes: true
			});
		    return false;
	    });
		  
	});

}

window.fbAsyncInit = function() {
FB.init({
  appId      : '193079904604336',
  xfbml      : true,
  version    : 'v2.6'
});
};

(function(d, s, id){
 var js, fjs = d.getElementsByTagName(s)[0];
 if (d.getElementById(id)) {return;}
 js = d.createElement(s); js.id = id;
 js.src = "//connect.facebook.net/en_US/sdk.js";
 fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));