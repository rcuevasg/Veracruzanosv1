<?php
/**
 * Template mostrado cuando se carga o se accede a la categoria de videos
 */

get_header(); ?>

			<div id="content" class="different" role="main">
			
				<!-- navegacion -->
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

				<h1 class="title-list">
				<span class="icon_tag_tv"></span>
				<?php
					printf( __( '%s', 'coraline' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>
				
				<div id="content-list">
				
				<?php
				$idCategoria = get_cat_ID(single_cat_title( '', false ));
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$videos = new WP_Query($query_string . '&posts_per_page=8');
				if ($videos->have_posts()):
			
				while ($videos->have_posts()): $videos->the_post();
					//$wp_query->in_the_loop = true;
					$urlVideo = substr(get_the_excerpt(), 0, strrpos(get_the_excerpt(), "<a")-1);
					?>
					<div class="box-list">
						<?php
						global $smart_youtube_pro;
						print $smart_youtube_pro->check( $urlVideo, 0);
        				print "<a class='title' href='" . get_permalink() . "' title='" . get_the_title() ."' >" . get_the_title() . "</a>";
        				print "<span class='bottom'><small class='date'>" . get_the_time('d M, Y') . "</small>";
        				print "<a href='" . get_permalink() . "' class='btn_more' title='Ver video ". get_the_title() ."'>Ver video</a></span>";
						?>
					</div>
					<?php
				endwhile;
				?>
				<?php /* Display navigation to next/previous pages when applicable */ 
					if(function_exists('wp_pagenavi')) { 
							wp_pagenavi( array(
							'query' =>$videos   
						)); 
					}
				endif;
				?>
				
				</div><!-- #content-list -->
				
			</div><!-- #content -->

<?php get_sidebar('list'); ?>
<?php get_footer(); ?>