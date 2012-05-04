<!-- Contenido de la sección policiaca -->
			<?php
				$opinion = get_category_by_slug('opinion');
				$columnas = get_category_by_slug('columnas');
			?>
			<div id='home_section' class='WDSCarouselOpinion'>
				<div id='WDSCOTitle'>
					 <h2><a href="<?php print esc_url(get_category_link($opinion->cat_ID)) ?>">Opini&oacute;n </a><a href="<?php print esc_url(get_category_link($columnas->cat_ID)) ?>" class="cat"> Columnas</a></h2>
				</div>
			<div class='WDSCOslideshow'>
			<?php
			//Obtenemos el id de la categoria
			$idObj = get_category_by_slug('opinion'); 
  			$categoria = get_category($idObj->term_id);
  			$idCategoria = $categoria->cat_ID;
  			$nameCategoria = $categoria->cat_name;
  			//Preparamos el query
			$news = new WP_Query('cat=' . $idCategoria . '&showposts=18');
			$step = 1;
			$countSlide = 0;
			$idCat = "";
			$nameCat = "";
			$urlCat = "";
			while ($news->have_posts()) :
    			$news->the_post();
			    $wp_query->in_the_loop = true;
			    
			    //Obtenemos la categoria de cada nota
				$categorias = get_the_category();
   				foreach ($categorias as $c):
				if ($c->cat_ID == $idCategoria ) :
					continue;
				else :
					$idCat = $c->cat_ID;
					$nameCat = $c->cat_name;
					$urlCat = esc_url(get_category_link($c->cat_ID));
				endif;
				endforeach;
				
		    	if ($step == 1):
    				?>
    				<div class='slide'>
    					<div class="featured">
    							<h3>
    							<a class='btn_title' href='<?php print get_permalink() ?>'><?php print get_the_title() ?>…</a>
    							</h3>
    							<span><?php ciii_category_images( 'category_ids='.$idCat ); ?></span>
    							<div class="entry-meta">
									<?php $autorNota = get_post_meta($post->ID, 'autor', true); ?>
									<?php if (!empty($autorNota)) : print "Por " . $autorNota; endif; ?>
								</div><!-- .entry-meta -->
    					</div>
    				<?php
		    		$step++;
    				$countSlide++;
		    	elseif ($step == 6):
		    		?>
		    			<div class="featured">
    							<h3>
    							<a class='btn_title' href='<?php print get_permalink() ?>'><?php print get_the_title() ?>…</a>
    							</h3>
    							<?php ciii_category_images( 'category_ids='.$idCat ); ?>
    							<div class="entry-meta">
									<?php $autorNota = get_post_meta($post->ID, 'autor', true); ?>
									<?php if (!empty($autorNota)) : print "Por " . $autorNota; endif; ?>
								</div><!-- .entry-meta -->
    					</div>
    				</div>
		    		<?php
    				$step = 1;
		    		$countSlide++;
    			else:
    				?>
    					 <div class="featured">
    							<h3>
    							<a class='btn_title' href='<?php print get_permalink() ?>'><?php print get_the_title() ?>…</a>
    							</h3>
    							<?php ciii_category_images( 'category_ids='.$idCat ); ?>
    							<div class="entry-meta">
									<?php $autorNota = get_post_meta($post->ID, 'autor', true); ?>
									<?php if (!empty($autorNota)) : print "Por " . $autorNota; endif; ?>
								</div><!-- .entry-meta -->
    					</div>
    				<?php
		    		$step++;
    				$countSlide++;
		    	endif;
    
		    endwhile;
    
		    if ($countSlide % 6 ):
		    	?>
		    	</div>
		    	<?php
		    endif;
	
			?>
			</div>
				<div class='bottom'>
					<div class='WDSCOnav'></div>
					<a href='<?php print esc_url(get_category_link($idCategoria)) ?>'>Ver todo</a>
				</div>
			</div>
	
			<!-- Fin de la sección policiaca -->