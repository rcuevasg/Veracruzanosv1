<?php
/**
 * Template mostrado cuando se carga o se accede a la categoria de videos
 */

get_header(); ?>

			
			<div id="content" class="different" role="main">
				
				<!-- Navegacion -->
				<?php include(TEMPLATEPATH.'/includes/breadcumb.php'); ?> 
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
						print "<a class='title' href='" . get_permalink() . "' title='" . get_the_title() ."' >" . get_the_title() . "</a>";
						global $smart_youtube_pro;
						print $smart_youtube_pro->check( $urlVideo, 0);
        				
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