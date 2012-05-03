<?php
/**
 * Template mostrado cuando se carga o se accede a la categoria de la entrevista
 */

get_header(); ?>

			<div id="content" class="different" role="main">
			
				<!-- Navegacion -->
				<div id="breadcrumbs">
				<?php 
				$category = get_the_category();
				$idCategoria = $category[0]->cat_ID;
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
								print " / <span class='masGrande'>" . $item . "</span>";
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
				
				<?php
				$idCategoria = get_cat_ID(single_cat_title( '', false ));
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$entrevistas = new WP_Query($query_string . '&posts_per_page=12');
				if ($entrevistas->have_posts()):
			
				while ($entrevistas->have_posts()): $entrevistas->the_post();
					//$wp_query->in_the_loop = true;
					?>
					<div class="box-list">
	
						<?php //Obtenemos la url de la imagen 
    					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'big'));
    					$thumbnailsrc = "";
    					if (!empty($domsxe))
							$thumbnailsrc = $domsxe->attributes()->src;
						if (!empty($thumbnailsrc)):
						?>
			 			<span class='img'><img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=84&h=74' border=0 /></span>
			 			<?php
			 			endif;
			 			?>
				
						<?php
        				print "<a class='title' href='" . get_permalink() . "' title='" . get_the_title() ."' >" . get_the_title() . "</a>";
        				$resumen = substr(get_the_excerpt(), 0, strrpos(get_the_excerpt(), "<a")-1);
        				print "<p>" . substr($resumen, 0, 84). "...</p>" ;
        				print "<span class='bottom'><small class='date'>" . get_the_time('d M, Y') . "</small>";
        				print "<a href='" . get_permalink() . "' class='btn_more' title='Ver video ". get_the_title() ."'>Continuar leyendo</a></span>";
						?>
					</div>
					<?php
				endwhile;
				?>
				<?php /* Display navigation to next/previous pages when applicable */ 
					if(function_exists('wp_pagenavi')) { 
							wp_pagenavi( array(
							'query' =>$entrevistas   
						)); 
					}
				endif;
				?>
				
				</div><!-- #content-list -->
				
			</div><!-- #content -->
	

<?php get_sidebar('list'); ?>

<?php get_footer(); ?>