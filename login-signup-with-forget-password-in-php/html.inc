<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title><?php echo $title;?> | PGPGang.com</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <style type="text/css">
      img {border-width: 0}
      * {font-family:'Lucida Grande', sans-serif;}
    </style>
  </head>
  <body onload="changePagination('0','first')">
    <div>
      <h2><?php echo $heading;?>&nbsp;&nbsp;&nbsp;=> <a href="http://www.phpgang.com/">Home</a> | <a href="http://demo.phpgang.com/">More Demos</a></h2>


      <p>
        <div style="margin-top:8px">
<iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/follow_button.1354093195.html#_=1354256562997&amp;id=twitter-widget-8&amp;lang=en&amp;screen_name=PHPGang&amp;show_count=true&amp;show_screen_name=true&amp;size=m" class="twitter-follow-button" style="width: 256px; height: 20px;" title="Twitter Follow Button" data-twttr-rendered="true"></iframe>
</div>
        <div style="float:left;width:90px">
<a href="http://feeds2.feedburner.com/PHPGang" title="PHPGang feed"><img alt="feed" height="26" src="http://feeds2.feedburner.com/~fc/PHPGang?bg=f2a0bb&amp;fg=000000&amp;anim=0&amp;label=Readers" style="border:0;margin-right:10px;margin-top:6px" width="88"></a>
</div>
<div style="float:left;width:120px;margin-left:20px;margin-top:2px">
<iframe allowtransparency="true" frameborder="0" scrolling="no" src="//www.facebook.com/plugins/subscribe.php?href=https%3A%2F%2Fwww.facebook.com%2Fhuzoorbux&amp;layout=button_count&amp;show_faces=true&amp;colorscheme=light&amp;font&amp;width=200&amp;appId=206841902768508" style="border:none; overflow:hidden; width:160px;height:25px;margin-top:5px"></iframe>
</div>
<!-- Place this tag where you want the badge to render. -->
<div style="float: left; margin-left: -230px; margin-top: 34px; padding-right: 20px;">
<!-- Place this tag where you want the badge to render. -->
<div class="g-plus" data-width="260" data-height="69" data-href="//plus.google.com/105998690580104341298" data-rel="publisher"></div>

<!-- Place this tag after the last badge tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script></div>
      </p>
      <script type="text/javascript"><!--
google_ad_client = "ca-pub-6883622550208397";
/* PHPGang */
google_ad_slot = "4910595708";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21769945-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

      <hr />
      <?php if(isset($extra)) { // EXTRA WORDS in Theme?>
      <div>
        <?php echo $extra; ?>
      </div>
      <?php }?>
 
  <p>
        <?php if(!isset($pre)) {?>
      <pre>
        <?php print_r($content); ?>
      </pre>
      <?php }else{ ?>
       <?php print_r($content); ?>
      <?php } ?>
    </p>
     
    

  </body>
</html>
