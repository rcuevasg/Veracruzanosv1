<?php
/**
 * Template mostrado cuando se carga o se accede a la categoria de videos
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
				$entrevistas = new WP_Query($query_string . '&posts_per_page=12');
				if ($entrevistas->have_posts()):
			
				while ($entrevistas->have_posts()): $entrevistas->the_post();
					//$wp_query->in_the_loop = true;
					?>
					<div>
						<?php
						the_post_thumbnail('thumbnail');
        				print "<h3><a href='" . get_permalink() . "' title='" . get_the_title() ."' >" . get_the_title() . "</a></h3>";
        				print substr(get_the_excerpt(), 0, strrpos(get_the_excerpt(), "<a")-1);
        				print "<span><small>" . get_the_time('d M, Y') . "</small>";
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