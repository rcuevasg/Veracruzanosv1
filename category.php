<?php
/**
 * Template mostrado cuando se carga o se accede a la categoria en general
 */

get_header(); ?>

		<div id="content-container">
			<div id="content" role="main">

				<h1 class="page-title"><?php
					printf( __( '%s', 'coraline' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>
				
				<?php
				$idCategoria = get_cat_ID(single_cat_title( '', false ));
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$notas = new WP_Query($query_string . '&posts_per_page=20');
				if ($notas->have_posts()):
				$step = 1;
				$cierraUltimoDiv = false;
				while ($notas->have_posts()): $notas->the_post();
					//$wp_query->in_the_loop = true;
					
					if ($step == 1):
					?>
						<!-- Estamos en el primer elemento por lo que procedemos a generar la nota principal -->
						<div>
						<a href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
						<?php print substr(get_the_content(), 0, 300); ?>
						<span>
							<small><?php print get_the_time('d M, Y'); ?></small>
        					<a href='<?php print get_permalink() ?>' class='btn_more' title='Continuar leyendo <?php get_the_title() ?>'>Continuar leyendo</a>
        				</span>
        				<?php the_post_thumbnail('medium'); ?>
						
						</div>
					<?php
						$step++;
					elseif ($step == 2):
						?>
						<!-- Iniciamos el primer listado -->
						<ul class='listadoIzquierda'>
							<li>
								<div>
								<a href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
								<span><?php print substr(get_the_content(), 0, 100); ?>…</span>
								<?php //Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'medium'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=150' border=0 /></span>
						 			<?php
						 			endif;
						 			?>
								</div>
							</li>
						<?php
						$step++;
					elseif ($step > 2 && $step < 7):
						?>
							<li>
								<div>
								<a href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
								<span><?php print substr(get_the_content(), 0, 100); ?>…</span>
								<?php //Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'medium'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=150' border=0 /></span>
						 			<?php
						 			endif;
						 			?>
								</div>
							</li>
						<?php
						$step++;
					elseif ($step == 7):
						?>
							<li>
								<div>
								<a href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
								<span><?php print substr(get_the_content(), 0, 100); ?>…</span>
								<?php //Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'medium'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=150' border=0 /></span>
						 			<?php
						 			endif;
						 			?>
								</div>
							</li>
						</ul>
						<?php
						$step++;
					elseif ($step == 8):
						?>
						<!-- Iniciamos el segundo listado -->
						<ul class='listadoDerecha'>
							<li>
								<div>
								<a href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
								<span><?php print substr(get_the_content(), 0, 100); ?>…</span>
								<?php //Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'medium'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=100' border=0 /></span>
						 			<?php
						 			endif;
						 			?>
								</div>
							</li>
						<?php
						$step++;
					elseif ($step > 8 && $step < 16):
						?>
							<li>
								<div>
								<a href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
								<span><?php print substr(get_the_content(), 0, 100); ?>…</span>
								<?php //Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'medium'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=100' border=0 /></span>
						 			<?php
						 			endif;
						 			?>
								</div>
							</li>
						<?php
						$step++;
					elseif ($step == 16):
						?>
							<li>
								<div>
								<a href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
								<span><?php print substr(get_the_content(), 0, 100); ?>…</span>
								<?php //Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'medium'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=100' border=0 /></span>
						 			<?php
						 			endif;
						 			?>
								</div>
							</li>
						</ul>
						<?php
						$step++;
					elseif ($step == 17):
						$cierraUltimoDiv = true;
						?>
						<!-- Iniciamos el div del ultimo listado -->
						<div >
							<h3>M&aacute;s notas de <?php single_cat_title( '', false ) ?></h3>
							<ul>
							<li><a href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a></li>
						<?php
						$step++;
					elseif ($step > 17):
						?>
							<li><a href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a></li>
						<?php
						$step++;
					endif;
					
				endwhile;
				endif;
				?>
				</ul>
				<?php
				if ($cierraUltimoDiv):
					print "</div>";
				endif;
				?>
				
				
			</div><!-- #content -->
		</div><!-- #content-container -->
<aside>
<?php //get_sidebar(); ?>
	<div id="single_sidebar" >  
     	<?php // The primary sidebar used in all internal pages
        if (  ! dynamic_sidebar( 'single-sidebar-listado-widget-area' ) ) : ?>
        	<?php endif; // end primary widget area ?>
     </div> <!-- #single_sidebar -->
</aside>
<?php get_footer(); ?>