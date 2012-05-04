<?php
/**
 * Template mostrado cuando se carga o se accede a la categoria en general
 */

get_header(); ?>

			<div id="content" role="main">
				
				<!-- Navegacion -->
				<div id="breadcrumbs">
				<?php 
				//print "El id actual es " . $cat_ID;
				$category = get_the_category();
				$idCategoria = get_cat_id( single_cat_title("",false) );//$category[0]->cat_ID;
				//$idCategoria = get_cat_ID(single_cat_title( '', false ));
				$navegacion = get_category_parents($idCategoria,true,',',true); 
				$elementosNavegacion = explode(",",$navegacion);
				if (in_category('veracruzanos-tv') || in_category('la-entrevista') || in_category('voto-veracruz') || in_category('susecion_presidencial')):
					//Navegación especial
					print "<div class='navegacionEspecial'>";
					print "<a href='".get_bloginfo('wpurl')."'>Inicio</a>";
					$numElementos = count($elementosNavegacion) - 1;
					$elemMenu = 1;
					foreach ($elementosNavegacion as $item){
						if (!empty($item)):
							if ($elemMenu == $numElementos):
								//print " / <h1 class='title-list'>" . single_cat_title( '', false ) . "</h1>";
								continue;
							else:
								print " / " . $item;
							endif;
							$elemMenu++;
						endif;
					}
				else:
					//Navegacion normal
					print "<div class='navegacionNormal'>";
					print "<a href='".get_bloginfo('wpurl')."'>Inicio</a>";
					foreach ($elementosNavegacion as $item){
						if (!empty($item)):
							print " / " . $item;
						endif;
					}
				endif;
				print "</div>";
				//print $navegacion;
				?>
			</div> 
				<!-- Fin navegacion -->

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
				$revisaPadre = get_category_parents($idCategoria,false,',');
				$esPadre = false;
				if ($revisaPadre == single_cat_title( '', false ).','):
					$esPadre = true;
				endif;
				while ($notas->have_posts()): $notas->the_post();
					//$wp_query->in_the_loop = true;
					//Obtenemos la categoria de cada nota
					$categorias = get_the_category();
   					foreach ($categorias as $c):
					if ($c->cat_ID == $idCategoria ) :
						continue;
					else :
						$nameCat = $c->cat_name;
						$urlCat = esc_url(get_category_link($c->cat_ID));
					endif;
					endforeach;
					
					if ($step == 1):
					?>
					<!-- Estamos en el primer elemento por lo que procedemos a generar la nota principal -->
					<div class="featured clearfix">
						<?php
						if ($esPadre):
						?>
						<a class='btn_cat' href='<?php print $urlCat ?>' title='Ir a la seccion <?php print $nameCat ?>'><?php print $nameCat ?></a>
						<?php
						endif;
						?>
						<a class="title" href="<?php the_permalink() ?>" title="Continuar leyendo <?php the_title() ?>"><?php the_title() ?></a>
						<p><?php print substr(get_the_content(), 0, 300); ?></p>
						
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
						
					</div><!-- Fin del div featured clearfix -->

					<?php
						$step++;
					elseif ($step == 2):
						?>
						<!-- Iniciamos el primer listado -->
						<ul class="list-iz clearfix">
							<li>

								<div>
								<?php
						if ($esPadre):
						?>
						<a class='btn_cat' href='<?php print $urlCat ?>' title='Ir a la seccion <?php print $nameCat ?>'><?php print $nameCat ?></a>
						<?php
						endif;
						?>
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

				               <?php
						if ($esPadre):
						?>
						<a class='btn_cat' href='<?php print $urlCat ?>' title='Ir a la seccion <?php print $nameCat ?>'><?php print $nameCat ?></a>
						<?php
						endif;
						?>
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

								<?php
						if ($esPadre):
						?>
						<a class='btn_cat' href='<?php print $urlCat ?>' title='Ir a la seccion <?php print $nameCat ?>'><?php print $nameCat ?></a>
						<?php
						endif;
						?>

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

					            <?php
						if ($esPadre):
						?>
						<a class='btn_cat' href='<?php print $urlCat ?>' title='Ir a la seccion <?php print $nameCat ?>'><?php print $nameCat ?></a>
						<?php
						endif;
						?>
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
							    
							    <?php
						if ($esPadre):
						?>
						<a class='btn_cat' href='<?php print $urlCat ?>' title='Ir a la seccion <?php print $nameCat ?>'><?php print $nameCat ?></a>
						<?php
						endif;
						?>
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

								<?php
						if ($esPadre):
						?>
						<a class='btn_cat' href='<?php print $urlCat ?>' title='Ir a la seccion <?php print $nameCat ?>'><?php print $nameCat ?></a>
						<?php
						endif;
						?>
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
				
				<?php
				if ($cierraUltimoDiv):
					print "</div>";
				endif;
				if ($step > 1 && $step < 7):
					print "</ul></div>";
				elseif ($step >= 8 && $step < 16):
					print "</ul></div>";
				elseif ($step >= 16 && $step <= 20):
					print "</ul></div>";
				endif;
				?>
				
				</div><!-- #content-list -->
				
			</div><!-- #content -->

<?php get_sidebar('list'); ?>

<?php get_footer(); ?>