<?php
/**
 * Template mostrado cuando se carga o se accede a la categoria de sucesión presidencial
 */

get_header(); ?>
			
			<div id="content" class="different" role="main">
			
				<!-- Navegacion -->
				<?php include(TEMPLATEPATH.'/includes/breadcumb.php'); ?> 
				<!-- Fin navegacion -->
				
				<h1 class="title-list">
				<span class="icon_tag_voto"></span>
				<?php
					printf( __( '%s', 'coraline' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>
				
				<div id="content-list">
				
				
				<?php
				$idCategoria = get_cat_ID(single_cat_title( '', false ));
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$notas = new WP_Query($query_string . '&posts_per_page=20');
				if ($notas->have_posts()):
				$step = 1;
				$cierraPrimerUL = false;
				$cierraSegundoUL = false;
				while ($notas->have_posts()): $notas->the_post();
					//$wp_query->in_the_loop = true;
					?>
					
					<?php
					//Preguntamos si el step es menor o igual con 4, si es así generamos el primer elemento
					if ($step < 5):
						
						if ($step == 1):
							//Si el step es igual con 1 entonces generamos la nota principal
							?>
							<div class="featured clearfix">
							
								<div class="col-iz">
								
								<a class="title" href='<?php print get_permalink() ?>' title='Continuar leyendo <?php print get_the_title() ?>'><?php the_title(); ?></a>
								<p><?php print substr(strip_tags(get_the_content()), 0, 200) ?>…</p>
								
								<span class="bottom">
									<small class="date"><?php get_the_time('d M, Y'); ?></small>
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
						        
						        <div class="col-de">
									<ul class="list-de">
									<?php
									 $step++;
								    else:
									//Si el step ya no es uno procedemos a armar la lista de 3 notas del costado derecho
									?>
									<li>
									
										<a class="title" href='<?php print get_permalink() ?>' title='Continuar leyendo <?php print get_the_title() ?>'><?php the_title(); ?></a>
										<?php
										//Obtenemos la url de la imagen destacada
				    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'medium'));
				    					$thumbnailsrc = "";
				    					if (!empty($domsxe))
											$thumbnailsrc = $domsxe->attributes()->src;
										if (!empty($thumbnailsrc)):
										?>
							 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=82&h=70' border=0 /></span>
							 			<?php
										endif;
										?>
										<p><?php print substr(strip_tags(get_the_content()), 0, 80) ?>…</p>
									
									</li>
									<?php
									$step++;
								endif;
								?>
								<?php
							endif; //Fin de la primera sección
							?>
							
							<!-- Generamos el primer ul con imagenes medianas -->
							<?php
							if ($step == 5):
								//Generamos el primer elemento del primer listado ul
								?>
								</ul>
								
							</div><!-- col_de-->
							
						</div><!-- Fin del div contenidoPrincipal -->
						
						<div class="col-iz">
						
						<ul class="list-iz clearfix">
							<li>
								
								<a class="title"  href='<?php print get_permalink() ?>' title='Continuar leyendo <?php print get_the_title() ?>'><?php the_title(); ?></a>
									
								<?php
								//Obtenemos la url de la imagen destacada
		    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'thumbnail'));
		    					$thumbnailsrc = "";
		    					if (!empty($domsxe))
									$thumbnailsrc = $domsxe->attributes()->src;
								if (!empty($thumbnailsrc)):
								?>
					 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=140&h=96' border=0 /></span>
					 			<?php
								endif;
								?>
								<p><?php print substr(strip_tags(get_the_content()), 0, 140) ?>…</p>
								
							</li>
						
						<?php
						$step++;
					elseif ($step > 5 && $step < 11):
						//Generamos el listado de los demas elementos de la primera columna
						?>
							<li>
								
								<a class="title"  href='<?php print get_permalink() ?>' title='Continuar leyendo <?php print get_the_title() ?>'><?php the_title(); ?></a>
								<?php
								//Obtenemos la url de la imagen destacada
		    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'thumbnail'));
		    					$thumbnailsrc = "";
		    					if (!empty($domsxe))
									$thumbnailsrc = $domsxe->attributes()->src;
								if (!empty($thumbnailsrc)):
								?>
					 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc ?>&w=140&h=96' border=0 /></span>
					 			<?php
								endif;
								?>
								<p><?php print substr(strip_tags(get_the_content()), 0, 140) ?>…</p>
						
							</li>
						<?php
						if ($step == 10):
							?>
							</ul><!-- Cerramos el primer ul -->
							<?php
						endif;
							
						$step++;
					endif;
					?>
					<!-- Fin del primer ul con imagenes medianas -->
					
					<!-- Iniciamos el segundo ul -->
					<?php
					if ($step == 11):
					?>
					</div><!--col-iz-->
					
					<div class="col-de">
					
						<ul class="list-de">
							<li>
						
								<a class="title" href='<?php print get_permalink() ?>' title='Continuar leyendo <?php print get_the_title() ?>'><?php the_title(); ?></a>
								<?php
								//Obtenemos la url de la imagen destacada
		    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'thumbnail'));
		    					$thumbnailsrc = "";
		    					if (!empty($domsxe))
									$thumbnailsrc = $domsxe->attributes()->src;
								if (!empty($thumbnailsrc)):
								?>
					 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc ?>&w=82&h=56' border=0 /></span>
					 			<?php
								endif;
								?>
								<p><?php print substr(strip_tags(get_the_content()), 0, 90) ?>…</p>
								
							</li>
						<?php
							$step++;
						elseif ($step > 11 && $step < 17):
						?>
							<li>
								
								<a class="title"  href='<?php print get_permalink() ?>' title='Continuar leyendo <?php print get_the_title() ?>'><?php the_title(); ?></a>
								<?php
								//Obtenemos la url de la imagen destacada
		    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'thumbnail'));
		    					$thumbnailsrc = "";
		    					if (!empty($domsxe))
									$thumbnailsrc = $domsxe->attributes()->src;
								if (!empty($thumbnailsrc)):
								?>
					 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc ?>&w=82&h=56' border=0 /></span>
					 			<?php
								endif;
								?>
								<p><?php print substr(strip_tags(get_the_content()), 0, 90) ?>…</p>
								
							</li>
						<?php
						if ($step == 16):
							?>
							</ul><!-- Cerramos el segundo ul -->
							
							</div><!--col-de-->
							<?php
						endif;
							
						$step++;
					endif;
					?>
					<!-- Fin del segundo ul -->
					
					<!-- Iniciamos el último listado -->
					<?php
					if ($step == 17):
						//Iniciamos el ultimo listado
						?>
						<div class="list-end clearfix">
						<h2>m&aacute;s de <span> <?php print single_cat_title( '', false ) ?><span></h2>
						<ul>
							<li>
							<a class="title" href="<?php print get_permalink() ?>" title="Continuar leyendo <?php print get_the_title() ?>"><span class="date"><?php print get_the_time('d M, Y'); ?></span><?php the_title() ?></a></li>
						<?php
						$step++;
					elseif ($step > 17 && $step < 21):
						?>
						<li><a class="title" href="<?php print get_permalink() ?>" title="Continuar leyendo <?php print get_the_title() ?>"><span class="date"><?php print get_the_time('d M, Y'); ?></span><?php the_title() ?></a></li>
						<?php
						if ($step == 20):
						?>
							</ul><!-- Fin del ul de la ultima lista -->
						
						<?php
						endif;
						$step++;
					endif;
					?>
					<!-- Fin del ultimo listado -->
					
					<?php
				endwhile;
				?>
				<?php /* Display navigation to next/previous pages when applicable */ 
					/*if(function_exists('wp_pagenavi')) { 
							wp_pagenavi( array(
							'query' =>$notas   
						)); 
					}*/
				endif;
				?>
					</div><!-- Fin del div de la ultima lista -->
				
				</div><!-- #content-list -->
				
			</div><!-- #content -->

		
<?php get_sidebar('list'); ?>

<?php get_footer(); ?>