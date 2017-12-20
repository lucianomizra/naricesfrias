<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
  FB._https = true;
  FB.init({
    appId      : '<?= $this->config->item('fb-app-id', 'app') ?>',
    xfbml      : true,
    version    : 'v2.0',
    channelUrl : '<?= str_replace(array('http:','https:'),'', base_url()) ?>channel.html'
  });
};
(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "//connect.facebook.net/es_LA/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));
</script>