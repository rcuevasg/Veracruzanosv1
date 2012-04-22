<?php
/**
 * @package WordPress
 * @subpackage Coraline
 * @since Coraline 1.0
 */

get_header(); ?>

		<div id="content-container">
			<div id="content" role="main">

			<?php //get_template_part( 'loop', 'index' ); ?>
			
			<?php 
				if (function_exists("WebDevStudio_PhotoCarousel")):
					print WebDevStudio_PhotoCarousel();
				endif;
				
				if (function_exists("WebDevStudio_BannerCarousel")):
					print WebDevStudio_BannerCarousel();
				endif;
				
				if (function_exists("WebDevStudio_FeaturedNewsCarousel")):
					print WebDevStudio_FeaturedNewsCarousel();
				endif;
			?>
			
			</div><!-- #content -->
		</div><!-- #content-container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>