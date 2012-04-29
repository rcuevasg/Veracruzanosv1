<?php
/**
 * Template mostrado cuando se carga o se accede a la categoria de sucesión presidencial
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
							<div id='contenidoPrincipal'>
							<div>
								<h2><a href='<?php print get_permalink() ?>' title='Continuar leyendo <?php print get_the_title() ?>'><?php the_title(); ?></a></h2>
								<p><?php print substr(get_the_content(), 0, 400) ?>…</p>
								<span>
									<small><?php get_the_time('d M, Y'); ?></small>
        							<a href='<?php print get_permalink() ?>' class='btn_more' title='Continuar leyendo <?php get_the_title() ?>'>Continuar leyendo</a></span>
									<?php the_post_thumbnail('large'); ?>
							</div>
							<ul>
							<?php
							$step++;
						else:
							//Si el step ya no es uno procedemos a armar la lista de 3 notas del costado derecho
							?>
							<li>
								<div>
									<a href='<?php print get_permalink() ?>' title='Continuar leyendo <?php print get_the_title() ?>'><?php the_title(); ?></a>
									<?php
									//Obtenemos la url de la imagen destacada
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
									<span><?php print substr(get_the_content(), 0, 200) ?>…</span>
								</div>
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
						</div><!-- Fin del div contenidoPrincipal -->
						<ul class="listadoIzquierda">
							<li>
								<div>
									<a href='<?php print get_permalink() ?>' title='Continuar leyendo <?php print get_the_title() ?>'><?php the_title(); ?></a>
									<?php
									//Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'thumbnail'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=150' border=0 /></span>
						 			<?php
									endif;
									?>
									<span><?php print substr(get_the_content(), 0, 200) ?>…</span>
								</div>
							</li>
						
						<?php
						$step++;
					elseif ($step > 5 && $step < 11):
						//Generamos el listado de los demas elementos de la primera columna
						?>
							<li>
								<div>
									<a href='<?php print get_permalink() ?>' title='Continuar leyendo <?php print get_the_title() ?>'><?php the_title(); ?></a>
									<?php
									//Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'thumbnail'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc ?>&w=150' border=0 /></span>
						 			<?php
									endif;
									?>
									<span><?php print substr(get_the_content(), 0, 200) ?>…</span>
								</div>
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
						<ul class="listadoDerecha">
							<li>
								<div>
									<a href='<?php print get_permalink() ?>' title='Continuar leyendo <?php print get_the_title() ?>'><?php the_title(); ?></a>
									<?php
									//Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'thumbnail'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc ?>&w=100' border=0 /></span>
						 			<?php
									endif;
									?>
									<span><?php print substr(get_the_content(), 0, 100) ?>…</span>
								</div>
							</li>
					<?php
						$step++;
					elseif ($step > 11 && $step < 17):
					?>
						<li>
								<div>
									<a href='<?php print get_permalink() ?>' title='Continuar leyendo <?php print get_the_title() ?>'><?php the_title(); ?></a>
									<?php
									//Obtenemos la url de la imagen destacada
			    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'thumbnail'));
			    					$thumbnailsrc = "";
			    					if (!empty($domsxe))
										$thumbnailsrc = $domsxe->attributes()->src;
									if (!empty($thumbnailsrc)):
									?>
						 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc ?>&w=100' border=0 /></span>
						 			<?php
									endif;
									?>
									<span><?php print substr(get_the_content(), 0, 100) ?>…</span>
								</div>
							</li>
						<?php
						if ($step == 16):
							?>
							</ul><!-- Cerramos el segundo ul -->
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
						<div>
						<ul>
							<li><a href="<?php print get_permalink() ?>" title="Continuar leyendo <?php print get_the_title() ?>"><?php the_title() ?></a></li>
						<?php
						$step++;
					elseif ($step > 17 && $step < 21):
						?>
						<li><a href="<?php print get_permalink() ?>" title="Continuar leyendo <?php print get_the_title() ?>"><?php the_title() ?></a></li>
						<?php
						if ($step == 20):
						?>
							</ul><!-- Fin del ul de la ultima lista -->
							</div><!-- Fin del div de la ultima lista -->
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