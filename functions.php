<?php
add_action('init', 'register_custom_menu');
function register_custom_menu(){
	register_nav_menu('top_nav' , __('Top Navigation'));
}

// Area 1, located at the top of the sidebar.
register_sidebar( array(
	'name' => __( 'Primary Widget Area', 'levees' ),
	'id' => 'primary-widget-area',
	'description' => __( 'The primary widget area', 'levees' ),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
register_sidebar( array(
	'name' => __( 'Secondary Widget Area', 'levees' ),
	'id' => 'secondary-widget-area',
	'description' => __( 'The secondary widget area', 'levees' ),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

// Area 3, located in the footer. Empty by default.
register_sidebar( array(
	'name' => __( 'First Footer Widget Area', 'levees' ),
	'id' => 'first-footer-widget-area',
	'description' => __( 'The first footer widget area', 'levees' ),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

// Area 4, located in the footer. Empty by default.
register_sidebar( array(
	'name' => __( 'Second Footer Widget Area', 'levees' ),
	'id' => 'second-footer-widget-area',
	'description' => __( 'The second footer widget area', 'levees' ),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

// Area 5, located in the footer. Empty by default.
register_sidebar( array(
	'name' => __( 'Third Footer Widget Area', 'levees' ),
	'id' => 'third-footer-widget-area',
	'description' => __( 'The third footer widget area', 'levees' ),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

// Area 6, located in the footer. Empty by default.
register_sidebar( array(
	'name' => __( 'Fourth Footer Widget Area', 'levees' ),
	'id' => 'fourth-footer-widget-area',
	'description' => __( 'The fourth footer widget area', 'levees' ),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

// Area 7, located in the footer. Empty by default.
register_sidebar( array(
	'name' => __( 'Fifth Footer Widget Area', 'levees' ),
	'id' => 'fifth-footer-widget-area',
	'description' => __( 'The fifth footer widget area', 'levees' ),
	'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="widget-title">',
	'after_title' => '</h3>',
) );

// Custom Post Type for "Facts"
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'levees_facts',
		array(
			'labels' => array(
				'name' => __( 'Facts' ),
				'singular_name' => __( 'Fact' )
			),
		'public' => true,
		'has_archive' => false,
		'supports' => array (
		'title',
		'editor',
		'custom-fields'
			)
		)
	);
}

// "Facts" Widget
function widget_facts() {
?>
<div class="facts">
  <ul class="fadein">
<?php
	$args = array( 'post_type' => 'levees_facts', 'posts_per_page' => 100, 'orderby' => 'rand' );
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		echo '<li class="fact-content">';
		the_content(); ?>
		<p class="source">
			Source: <a href="<?php echo get_post_meta(get_the_ID(), 'Source Url', true); ?>" target="_blank"><?php echo get_post_meta(get_the_ID(), 'Source Name', true); ?></a>
		</p>
		</li>
	<?php
		
	endwhile;
	?>
	</ul>
</div>
	<?php 
}
 
register_sidebar_widget(__('Levee Facts'), 'widget_facts');

// Featured Video


 // ------------------------------------------------------------------
 // Add all your sections, fields and settings during admin_init
 // ------------------------------------------------------------------
 //
 
 function video_settings_api_init() {
 	// Add the section to reading settings so we can add our
 	// fields to it
 	add_settings_section('video_setting_section',
		'Featured Video',
		'video_setting_section_callback_function',
		'media');
 	
 	// Add the field with the names and function to use for our new
 	// settings, put it in our new section
 	add_settings_field('video_title',
		'Video Title',
		'video_title_callback_function',
		'media',
		'video_setting_section');
 
  	add_settings_field('video_id',
		'Video ID',
		'video_id_callback_function',
		'media',
		'video_setting_section');

 	add_settings_field('video_link',
		'"Read More" Url',
		'video_link_callback_function',
		'media',
		'video_setting_section');
	
 	// Register our setting so that $_POST handling is done for us and
 	// our callback function just has to echo the <input>
 	register_setting('media','video_id');
 	register_setting('media','video_title');
 	register_setting('media','video_link');
 }// video_settings_api_init()
 
 add_action('admin_init', 'video_settings_api_init');
 
  
 // ------------------------------------------------------------------
 // Settings section callback function
 // ------------------------------------------------------------------
 //
 // This function is needed if we added a new section. This function 
 // will be run at the start of our section
 //
 
 function video_setting_section_callback_function() {
 	echo '<p>Video that appears in the header of each page.</p>';
 }
 
 // ------------------------------------------------------------------
 // Callback function for our example setting
 // ------------------------------------------------------------------
 //
 // creates a checkbox true/false option. Other types are surely possible
 //
 
 function video_title_callback_function() {
 	echo '<input name="video_title" id="video_title" type="text" value="'.get_option('video_title').'" class="code" /> e.g. <em>The Big Uneasy Trailer</em>';
 }

 function video_id_callback_function() {
 	echo '<input name="video_id" id="video_id" type="text" value="'.get_option('video_id').'" class="code" /> e.g. <em>iST8js4HtOY</em>';
 }

 function video_link_callback_function() {
 	echo '<input name="video_link" id="video_link" type="text" value="'.get_option('video_link').'" class="code"  /> e.g. <em>http://levees.org/myth-busters</em>';
 }

/*

// ------------------------------------------------------------------
 // Add all your sections, fields and settings during admin_init
 // ------------------------------------------------------------------
 //
 
 function video_settings_api_init() {
 	// Add the section to reading settings so we can add our
 	// fields to it
 	add_settings_section('video_setting_section',
		'Featured Video',
		'video_setting_section_callback_function',
		'media');
 	
 	// Add the field with the names and function to use for our new
 	// settings, put it in our new section
 	add_settings_field('video_title',
		'Video Title',
		'video_title_callback_function',
		'media',
		'video_setting_section');
 	
 	add_settings_field('video_id',
		'Video ID',
		'video_id_callback_function',
		'media',
		'video_setting_section');
 	
 	add_settings_field('video_link',
		'Video Link',
		'video_link_callback_function',
		'media',
		'video_setting_section');
 	
 	// Register our setting so that $_POST handling is done for us and
 	// our callback function just has to echo the <input>
 	register_setting('media','video_title');
 	register_setting('media','video_id');
 	register_setting('media','video_link');
 }// video_settings_api_init()
 
 add_action('admin_init', 'video_settings_api_init');
 
  
 // ------------------------------------------------------------------
 // Settings section callback function
 // ------------------------------------------------------------------
 //
 // This function is needed if we added a new section. This function 
 // will be run at the start of our section
 //
 
 function video_setting_section_callback_function() {
 	echo '<p>The video that appears in the header of each page.</p>';
 }
 
 // ------------------------------------------------------------------
 // Callback function for our example setting
 // ------------------------------------------------------------------
 //
 // creates a checkbox true/false option. Other types are surely possible
 //
 
 function video_title_callback_function() {
 	echo '<input name="video_title" id="gv_thumbnails_insert_into_excerpt" type="text" value="'.get_option('video_title').'" class="code" /> Explanation text';
 }
 function video_id_callback_function() {
 	echo '<input name="video_id" id="gv_thumbnails_insert_into_excerpt" type="text" value="'.get_option('video_id').'" class="code" /> Explanation text';
 }
*/