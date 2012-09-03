<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?>
	</div><!-- #main -->

	<div id="footer" role="contentinfo">

	<?php get_sidebar( 'footer' ); ?>
		<div style="clear:both;"></div>
	</div><!-- #footer -->

</div><!-- #container -->

	<div id="post-footer">
		<p>Designed by <a href="http://stanfordrosenthal.com">Stanford Rosenthal</a>.  Powered by <a href="http://wordpress.org">Wordpress</a>.</p>
	</div>

<?php wp_footer(); ?>

<!-- Start of StatCounter Code -->
		  <script type="text/javascript" language="JavaScript">
	<!-- 
	var sc_project=1104261; 
	var sc_invisible=1; 
	var sc_partition=9; 
	var sc_security="d66eea88"; 
	var sc_text=2; 
	var sc_remove_link=1; 
	//-->
		</script>

		  <script type="text/javascript" language="JavaScript" src="http://www.statcounter.com/counter/counter.js"></script>
		  <noscript>
		  <img  src="http://c10.statcounter.com/counter.php?sc_project=1104261&java=0&security=d66eea88&invisible=0" alt="&nbsp;" border="0" />
		  </noscript>
<!-- End of StatCounter Code -->

</body>
</html>
