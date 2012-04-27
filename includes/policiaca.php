<!-- Contenido de la sección policiaca -->
			<div id='home_section' class='WDSCarouselPoliciaca'>
				<div id='WDSCPTitle'>
					 <h2><a href="">Policiaca</a></h2>
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
    					<div class="featured">
    						<span class='img'>
    							<?php
    							if (!empty($thumbnailsrc)):
    							?>
    							<img src='<?php print get_bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc ?>&w=200&h=115' border=0 /></span><h3>
    							<?php
    							endif;
    							?>
    							<a class='btn_title' href='<?php print get_permalink() ?>'><?php print get_the_title() ?>…</a>
    						</h3>
    					</div>
    				<?php
		    		$step++;
    				$countSlide++;
		    	elseif ($step == 3):
		    		?>
		    			<div class="featured f_three">
    						<span class='img'>
    							<?php
    							if (!empty($thumbnailsrc)):
    							?>
    							<img src='<?php print get_bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc ?>&w=200&h=115' border=0 /></span><h3>
    							<?php
    							endif;
    							?>
    							<a class='btn_title' href='<?php print get_permalink() ?>'><?php print get_the_title() ?>…</a>
    						 </h3>
    					</div>
    				</div>
		    		<?php
    				$step = 1;
		    		$countSlide++;
    			else:
    				?>
    					 <div class="featured">
    						<span class='img'>
    							<?php
    							if (!empty($thumbnailsrc)):
    							?>
    							<img src='<?php print get_bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc ?>&w=200&h=115' border=0 /></span><h3>    							<?php
    							endif;
    							?>
    							<a class='btn_title' href='<?php print get_permalink() ?>'><?php print get_the_title() ?>…</a>
    						</h3>
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