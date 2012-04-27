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
			

			<!-- Contenido de la sección policiaca -->
			<div id='WDSCarouselPoliciaca'>
				<div id='WDSCPTitle'>
					<h2>Policiaca</h2>
				</div>
			<div class='WDSCPslideshow'>
			<?php
			//Obtenemos el id de la categoria
			$idObj = get_category_by_slug('policiaca'); 
  			$categoria = get_category($idObj->term_id);
  			$idCategoria = $categoria->cat_ID;
  			$nameCategoria = $categoria->cat_name;
  			//Preparamos el query
			$news = new WP_Query('cat=' . $idCategoria . '&showposts=9');
			$step = 1;
			$countSlide = 0;
			while ($news->have_posts()) :
    			$news->the_post();
			    $wp_query->in_the_loop = true;
				
				//Obtenemos la url para la imagen destacada
			    $domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'medium'));
			    $thumbnailsrc = "";
			    if (!empty($domsxe))
					$thumbnailsrc = $domsxe->attributes()->src;
		    	if ($step == 1):
    				?>
    				<div class='slide'>
    					<div>
    						<span class='img'>
    							<?php
    							if (!empty($thumbnailsrc)):
    							?>
    							<img src='<?php print get_bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc ?>&w=200&h=84' border=0 /></span><span  class='title'>
    							<?php
    							endif;
    							?>
    							<a class='btn_title' href='<?php print get_permalink() ?>'><?php print get_the_title() ?>…</a>
    						</span>
    					</div>
    				<?php
		    		$step++;
    				$countSlide++;
		    	elseif ($step == 3):
		    		?>
		    			<div>
    						<span class='img'>
    							<?php
    							if (!empty($thumbnailsrc)):
    							?>
    							<img src='<?php print get_bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc ?>&w=200&h=84' border=0 /></span><span  class='title'>
    							<?php
    							endif;
    							?>
    							<a class='btn_title' href='<?php print get_permalink() ?>'><?php print get_the_title() ?>…</a>
    						</span>
    					</div>
    				</div>
		    		<?php
    				$step = 1;
		    		$countSlide++;
    			else:
    				?>
    					<div>
    						<span class='img'>
    							<?php
    							if (!empty($thumbnailsrc)):
    							?>
    							<img src='<?php print get_bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc ?>&w=200&h=84' border=0 /></span><span  class='title'>
    							<?php
    							endif;
    							?>
    							<a class='btn_title' href='<?php print get_permalink() ?>'><?php print get_the_title() ?>…</a>
    						</span>
    					</div>
    				<?php
		    		$step++;
    				$countSlide++;
		    	endif;
    
		    endwhile;
    
		    if ($countSlide % 3 ):
		    	?>
		    	</div>
		    	<?php
		    endif;
	
			?>
			</div>
				<div class='bottom'>
					<div class='WDSCPnav'></div>
					<a href='<?php esc_url(get_category_link($idCategoria)) ?>'>Ver todo</a>
				</div>
			</div>
	
			<!-- Fin de la sección policiaca -->
			
	</div><!-- #content -->
<aside>
<?php get_sidebar(); ?>
</aside>
<?php get_footer(); ?>