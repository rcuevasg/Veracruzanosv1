<?php
/**
 * @package WordPress
 * @subpackage Coraline
 * @since Coraline 1.0
 */

get_header(); ?>

			<div id="content" role="main">
			
			<!-- <div id="breadcrumbs">
				<?php //coraline_posted_in(); ?>
			</div> -->
			
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
				<?php
				if (in_category('videos')):
					include(TEMPLATEPATH.'/single-video.php');
				endif;
				?>
	
				<?php endwhile; // end of the loop. ?>
				
			</div><!-- #content -->
<aside>
<?php get_sidebar(); ?>
</aside>

<?php get_footer(); ?>