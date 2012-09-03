<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow:regular,bold' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans+Caption:regular,bold' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/script.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/cycle.js"></script>
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="container" class="hfeed">
	<div id="join">
		<a href="http://levees.org"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/logo.png" alt="Levees.Org" /></a>
		<div id="join_teaser">
			<h1>Join Levees.Org</h1>
			<p>Help us make sure New Orleans and America get the safe levees we deserve.</p>
		</div>
		<form method="post" action="http://salsa.wiredforchange.com/save?xml"> 
			<div id="join_form">
				<input class="text email" title="Email" type="text" id="email" name="email" value="your email address" onfocus="if(this.value=='your email address'){this.value='';}" onblur="if(this.value==''){this.value='your email address';}" /> 
				<input class="text zip" title="Zip Code" type="text" id="zip" name="zip" value="zip code" onfocus="if(this.value=='zip code'){this.value='';}" onblur="if(this.value==''){this.value='zip code';}" /> 
				<input type="submit" id="submit" class="submit" id="join_button" value="Join Now!" /> 
			</div>
			<div id="thanks" style="display:none">
				<p>Thanks!</p>
			</div>
		</form>
		<div id="loading" style="display:none;">
			Loading
		</div>
		<div id="join_meta">
			<p>You can unsubscribe at anytime.</p>
			<p>Based in Louisiana.  Chapters in Illinois, Florida, Oregon and New York.</p>
		</div>
		<div id="facebook">
			<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fleveesorg&amp;width=225&amp;colorscheme=light&amp;show_faces=false&amp;stream=false&amp;header=false&amp;height=62" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:225px; height:62px;" allowTransparency="true"></iframe>
		</div>
	</div>
	<div id="video">
		<p><a href="http://youtube.com/LeveesOrg">Watch more Levees.Org videos on YouTube</a></p>
		<div id="video_frame">
			<iframe width="340" height="200" src="http://www.youtube.com/embed/<?php echo get_option('video_id'); ?>" frameborder="0" allowfullscreen></iframe>
		</div>
		<p>Featured video: <strong><?php echo get_option('video_title'); ?></strong> (<a href="<?php echo get_option('video_link'); ?>">read more</a>)</p>
	</div>

	<?php wp_nav_menu(array('menu' => 'top_nav')); ?>
	
	<div id="main">
