<?php
/**
 * Template mostrado cuando se carga o se accede a la categoria en general
 */

get_header(); ?>

			<div id="content" role="main">

				<h1 class="title-list"><?php
					printf( __( '%s', 'coraline' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>
				
				<div id="content-list">
				
				<div class="col-iz">
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
					<div class="featured clearfix">
						<a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
						<p><?php print substr(get_the_content(), 0, 200); ?></p>
						
						<span class="bottom">
							<small class="date"><?php print get_the_time('d M, Y'); ?></small>
        					<a href='<?php print get_permalink() ?>' class='btn_more' title='Continuar leyendo <?php get_the_title() ?>'>Continuar leyendo</a>
        				</span>

						<?php //Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'big'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=360&h=210' border=0 /></span>
						 			<?php
						 			endif;
						 			?>

						</div>
					<?php
						$step++;
					elseif ($step == 2):
						?>
						<!-- Iniciamos el primer listado -->
						<ul class="list-iz clearfix">
							<li>
								
								<a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
								
								<?php //Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'medium'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=140&h=96' border=0 /></span>
						 			<?php
						 			endif;
						 			?>
								
								<p><?php print substr(get_the_content(), 0, 140); ?>…</p>
								
								
							</li>
						<?php
						$step++;
					elseif ($step > 2 && $step < 7):
						?>
							<li>
				
								<a class="title"  href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
								
								<?php //Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'medium'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=140&h=96' border=0 /></span>
						 			<?php
						 			endif;
						 			?>
						 			<p><?php print substr(get_the_content(), 0, 140); ?>…</p>
								
							</li>
						<?php
						$step++;
					elseif ($step == 7):
						?>
							<li>
								<a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
								
								<?php //Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'medium'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=140&h=96' border=0 /></span>
						 			<?php
						 			endif;
						 			?>
						 			<p><?php print substr(get_the_content(), 0, 140); ?>…</p>
							
							</li>
						</ul>
						<?php
						$step++;
					elseif ($step == 8):
						?>
					</div><!--col-iz-->
					
					<div class="col-de">
						
						<!-- Iniciamos el segundo listado -->
						<ul class="list-de">
							<li>
					
								<a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
								
								<?php //Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'medium'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=82&h=56' border=0 /></span>
						 			<?php
						 			endif;
						 			?>
								
								<p><?php print substr(get_the_content(), 0, 90); ?>…</p>

							</li>
						<?php
						$step++;
					elseif ($step > 8 && $step < 16):
						?>
							<li>
							
								<a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
								<?php //Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'medium'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=82&h=56' border=0 /></span>
						 			<?php
						 			endif;
						 			?>
								
								<p><?php print substr(get_the_content(), 0, 90); ?>…</p>

							</li>
						<?php
						$step++;
					elseif ($step == 16):
						?>
							<li>
								
								<a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
								<?php //Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'medium'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=82&h=56' border=0 /></span>
						 			<?php
						 			endif;
						 			?>
								
								<p><?php print substr(get_the_content(), 0, 90); ?>…</p>

							</li>
						</ul>
						</div><!--col-de-->
						
						<?php
						$step++;
					elseif ($step == 17):
						$cierraUltimoDiv = true;
						?>

						<!-- Iniciamos el div del ultimo listado -->
						<div class="list-end clearfix">
							<h2>m&aacute;s de <span> <?php print single_cat_title( '', false ) ?><span></h2>
							<ul>
							<li>
							
							<a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><span class="date"><?php print get_the_time('d M, Y'); ?></span><?php the_title() ?></a></li>
						<?php
						$step++;
					elseif ($step > 17):
						?>
							<li>
							<a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><span class="date"><?php print get_the_time('d M, Y'); ?></span><?php the_title() ?></a></li>
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
				
				</div><!-- #content-list -->
				
			</div><!-- #content -->

<?php get_sidebar('list'); ?>

<?php get_footer(); ?>