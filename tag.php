<?php get_header(); ?>
<?php get_sidebar(); ?>

		<div id="content" role="main">
				<h1 class="page-title"><?php
					printf( __( 'Tag Archives: %s', 'levees' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?></h1>
		<?php
		/* Run the loop to output the posts.
		 * If you want to overload this in a child theme then include a file
		 * called loop-index.php and that will be used instead.
		 */
		 get_template_part( 'loop', 'index' );
		?>
		</div><!-- #content -->

<?php get_footer(); ?>


