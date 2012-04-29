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
				elseif (in_category('la-entrevista')):
					include(TEMPLATEPATH.'/single-la-entrevista.php');
				endif;
				?>
	
				<?php endwhile; // end of the loop. ?>
				
			</div><!-- #content -->
<aside>
<?php //get_sidebar(); ?>
	<div id="single_sidebar" >  
     	<?php // The primary sidebar used in all internal pages
        if (  ! dynamic_sidebar( 'single-sidebar-widget-area' ) ) : ?>
        	<?php endif; // end primary widget area ?>
     </div> <!-- #single_sidebar -->
</aside>

<?php get_footer(); ?>