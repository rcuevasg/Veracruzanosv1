<?php
/**
 * Template mostrado cuando se carga o se accede a la categoria de videos
 */

get_header(); ?>

			<div id="content" role="main">
			
				<!-- Navegacion -->
				<?php include(TEMPLATEPATH.'/includes/breadcumb.php'); ?> 
				<!-- Fin navegacion -->

				<h1 class="title-list">
				<!-- <span class="icon_tag_tv"></span> -->
				<?php
					printf( __( '%s', 'coraline' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>
				
				<div id="content-list">
				
				<?php
				$idCategoria = get_cat_ID(single_cat_title( '', false ));
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$columnas = new WP_Query($query_string . '&posts_per_page=12');
				if ($columnas->have_posts()):
			
				while ($columnas->have_posts()): $columnas->the_post();
					//$wp_query->in_the_loop = true;
					?>
					<div class="box-list">
						<?php
						//Imagen del autor
						ciii_category_images();
						
        				print "<a class='title' href='" . get_permalink() . "' title='" . get_the_title() ."' >" . get_the_title() . "</a>";
        				$autorNota = get_post_meta($post->ID, 'autor', true);
						if (!empty($autorNota)) : print "<span class='autor'>Por " . $autorNota . "</span>"; endif;
        				print "<span class='text'>".substr(strip_tags(get_the_content()), 0, 140)."...</span>";
        				print "<span class='bottom'><small class='date'>" . get_the_time('d M, Y') . "</small>";
        				print "<a href='" . get_permalink() . "' class='btn_more' title='Continuar leyendo ". get_the_title() ."'>Continuar leyendo</a></span>";
						?>
					</div>
					<?php
				endwhile;
				?>
				<?php /* Display navigation to next/previous pages when applicable */ 
					if(function_exists('wp_pagenavi')) { 
							wp_pagenavi( array(
							'query' =>$columnas   
						)); 
					}
				endif;
				?>
				
				</div><!-- #content-list -->
				
			</div><!-- #content -->

<?php get_sidebar('list'); ?>
<?php get_footer(); ?>