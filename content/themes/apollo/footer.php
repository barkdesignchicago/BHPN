<?php
/**
 * The theme footer
 * 
 * @package bootstrap-basic
 */
?>
	</div>
<footer id="site-footer" role="contentinfo" class="wireframebox">
    <div class="container" id="footer">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-push-6 footer-links">
	            <div class="col-md-4 col-md-push-2">
	                <?php echo strip_tags(wp_nav_menu(array(
	                    'menu' => 'Footer Links',
	                    'theme_location' => 'primary',
	                    'container' => false,
	                    'echo' => false,
	                    'before' => '',
	                    'depth' => 0,
	                    'link_before' => '',
	                    'link_after' => '',
	                    'items_wrap' => '%3$s',
	                    'menu_class' => '',
	                )), '<a><span>'); ?>
	            </div>
	            <div class="col-md-6 col-md-push-2 footer-social-links">
		            <a href="#" class="twitter-footer-link">@BHPNetwork</a>
		            <a href="#" class="newsletter-footer-link">Stay informed.<br />Sign up for our newsletter &raquo;</a>
	            </div>
	            <div class="col-md-12 col-md-push-2 footer-copyright">
		            &copy; <?php echo date('Y');?> Build Healthy Places Network&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#">Privacy Policy</a>
	            </div>
            </div>
            <div class="col-xs-6 col-md-3 col-md-pull-6"><div class="logo logo-bhpn"><img class="img-responsive" src="/content/themes/apollo/images/ftr-logo.png"></div></div>
            <div class="col-xs-6 col-md-3 col-md-pull-6"><div class="logo"><a href="http://www.rwjf.org" target="_blank"><img class="img-responsive" src="/content/themes/apollo/images/ftr-logo-rwjf.png"></div></div></a>
        </div>
    </div>
</footer>
    <!--</div><!--.container page-container-->
		
		
		<!--wordpress footer-->
		<?php
    wp_footer();
        //TYPEKIT IS HAVING PROBLEMS SO WE'RE HARD-CODING THE TYPEKIT STUFF INTO THE FOOTER
        ?>
<!--    <script type="text/javascript" src="//use.typekit.net/lop6rjo.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>-->
<!--
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('require', 'displayfeatures');
  ga('create', 'UA-55417873-1', 'auto');
  ga('send', 'pageview');
 
</script>
-->

<!--
<script>
function _gaLt(event){
    var el = event.srcElement || event.target;

    /* Loop up the tree through parent elements if clicked element is not a link (eg: an image inside a link) */
    while(el && (typeof el.tagName == 'undefined' || el.tagName.toLowerCase() != 'a' || !el.href))
        el = el.parentNode;

    if(el && el.href){
        if(el.href.indexOf(location.host) == -1){ /* external link */
            ga("send", "event", "Outgoing Links", el.href, document.location.pathname + document.location.search);
            /* if target not set then delay opening of window by 0.5s to allow tracking */
            if(!el.target || el.target.match(/^_(self|parent|top)$/i)){
                setTimeout(function(){
                    document.location.href = el.href;
                }.bind(el),500);
                /* Prevent standard click */
                event.preventDefault ? event.preventDefault() : event.returnValue = !1;
            }
        }

    }
}

/* Attach the event to all clicks in the document after page has loaded */
var w = window;
w.addEventListener ? w.addEventListener("load",function(){document.body.addEventListener("click",_gaLt,!1)},!1)
  : w.attachEvent && w.attachEvent("onload",function(){document.body.attachEvent("onclick",_gaLt)});
</script>
-->

        
	</body>
</html>
<!-- debug: end footer.php -->
