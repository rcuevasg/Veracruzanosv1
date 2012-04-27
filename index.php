<?php
/**
 * @package WordPress
 * @subpackage Coraline
 * @since Coraline 1.0
 */

get_header(); ?>

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
			
				<div id="banner1">  
                <?php // The primary sidebar used in all layouts index
                	if (  ! dynamic_sidebar( 'banner1-index-widget-area' ) ) : ?>
                    	<?php endif; // end primary widget area ?>
                </div> <!-- #widget_twitter -->
				
			<?php
				
				if (function_exists("WebDevStudio_CategoryNewsCarousel")):
					print WebDevStudio_CategoryNewsCarousel();
				endif;
				
			?>
			
				<div id="widget_twitter" >  
                <?php // The primary sidebar used in all layouts index
                	if (  ! dynamic_sidebar( 'twitter-index-widget-area' ) ) : ?>
                    	<?php endif; // end primary widget area ?>
                </div> <!-- #widget_twitter -->
                
           	<?php
           		if (function_exists("WebDevStudio_GeneralNews")):
					print WebDevStudio_GeneralNews(array('categoria' => "zona-norte",
														'layout' => "2News"));
														
					print WebDevStudio_GeneralNews(array('categoria' => "zona-centro",
														'layout' => "2News"));
														
					print WebDevStudio_GeneralNews(array('categoria' => "zona-sur",
														'layout' => "2News"));
														
					print WebDevStudio_GeneralNews(array('categoria' => "politica-politica",
														'layout' => "3News"));
					
					print WebDevStudio_GeneralNews(array('categoria' => "pais",
														'layout' => "1NewSmallPic"));
														
					print WebDevStudio_GeneralNews(array('categoria' => "mundo",
														'layout' => "1NewSmallPic"));
														
					print WebDevStudio_GeneralNews(array('categoria' => "cultura",
														'layout' => "1NewBigPic"));
														
					print WebDevStudio_GeneralNews(array('categoria' => "economia",
														'layout' => "3TextNews"));
				endif;
           	?>
           	
           	<div id="banner1">  
                <?php // The primary sidebar used in all layouts index
                	if (  ! dynamic_sidebar( 'encuesta-index-widget-area' ) ) : ?>
                    	<?php endif; // end primary widget area ?>
                </div> <!-- #widget_twitter -->
			
			
			<?php
				include(TEMPLATEPATH . "/includes/policiaca.php");
			?>
			
	</div><!-- #content -->
<aside>
<?php get_sidebar(); ?>
</aside>
<?php get_footer(); ?>