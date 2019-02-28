<footer>
<div class="container py-5">
<div class="row">
<div class="col-lg-4 col-md-6 col-sm-6"><div class="ftr_common">
<figure><img src="<?=SITE_PATH?>images/logo.png" class="img-fluid" alt="Dynamic Name"></figure>
<div class="copyright">Copyright © 2018, All rights reserved</div>
<div class="ftr_heading">Common Links</div>
<ul>
<li><a href="<?=SITE_PATH?>">Home</a></li>
<li><a href="<?=SITE_PATH?>contact-us/">Contact Us</a></li>
<li><a href="<?=SITE_PATH?>post/">Blogs</a></li>
<li><a href="<?=SITE_PATH?>disclaimer/" rel="nofollow">Disclaimer</a></li>
</ul>
</div></div>
<div class="col-lg-2 col-md-6 col-sm-6"><div class="prj_link">
<div class="ftr_heading">Project Links</div>
<ul>
<?  
//print_r($query);

foreach($query as $project) { 
?>
<li><a href="<?=SITE_PATH?>project/<? echo $project['url']?>" target="_blank"><? echo $project['name'];?></a></li>
<? }  ?>
</ul>
</div></div>
<div class="col-lg-3 col-md-6 col-sm-6"><div class="prj_link">
<div class="ftr_heading">Blog Links</div>
<ul>
<?  
//print_r($query);

foreach($blog as $blog) { 
?>
<li><a href="<?=SITE_PATH?>post/<? echo $blog['url']?>"><? echo $blog['name'];?></a></li>
<? }  ?>
</ul>
</div></div>
<div class="col-lg-3 col-md-6 col-sm-6"><div class="follow_us">
<div class="ftr_heading">Follow With Us</div>
<ol>
<li><a href="https://www.facebook.com/yoonewprojects" class="fa-facebook" target="_blank">Facebook</a></li>
<li><a href="https://twitter.com/yoo_new" class="fa-twitter" target="_blank">Twitter</a></li>
<li><a href="https://plus.google.com/102377378040275674107" class="fa-google-plus" target="_blank">google +</a></li>
<li><a href="https://in.pinterest.com/yoonewprojects/" class="fa-pinterest-p" target="_blank">Pinterest</a></li>
<li><a href="https://www.youtube.com/channel/UC3cIDkw0nWSMi85FRMYYhsA" class="fa-youtube-play" target="_blank">Youtube</a></li>
<li><a href="#" class="fa-linkedin" target="_blank">LinkedIn</a></li>
</ol>
</div></div>
</div>
</div>
</footer>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128355151-1"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', 'UA-128355151-1');
</script>
<script type="text/javascript">
$(window).scroll(function() {  
var hmscroll = $(window).scrollTop();
if (hmscroll > 20) {
$(".bg-dark").addClass("theme_bg");
}
else {$(".bg-dark").removeClass("theme_bg");}
});

function myFunction(){
var dots = document.getElementById("dots");
var moreText = document.getElementById("des_more");
var btnText = document.getElementById("myBtn");

if (dots.style.display === "none") {
dots.style.display = "inline";
btnText.innerHTML = "Read More &darr;"; 
moreText.style.display = "none";
} else {
dots.style.display = "none";
btnText.innerHTML = "Less &uarr;"; 
moreText.style.display = "inline";
}
}

$(window).scroll(function() {
if ($(this).scrollTop() > 870) {
$('#gotoQ').fadeIn('fast');
} else {
$('#gotoQ').fadeOut('fast');
}});
$("#gotoQ").click(function (){ $("html, body").animate({scrollTop:300},'slow');});
</script>