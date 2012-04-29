<?php
/**
 * @package WordPress
 * @subpackage Coraline
 * @since Coraline 1.0
 */

get_header(); ?>

			<div id="content" role="main">
			
			<!-- <div id="breadcrumbs">
				<?php //coraline_posted_in(); ?>
			</div> -->
			
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
				<?php
				if (in_category('videos')):
					include(TEMPLATEPATH.'/single-video.php');
				elseif (in_category('la-entrevista')):
					include(TEMPLATEPATH.'/single-la-entrevista.php');
				else:
					//Estamos viendo una noticia que no entra dentro de las categorias anteriores así que se muestra como una nota normal
					?>
					<div id="content-post">
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h1 class="entry-title"><?php the_title(); ?></h1>
	
						<div class="entry-meta">
							<?php coraline_posted_on(); ?> | Por <?php print get_post_meta($post->ID, 'autor', true); ?>
						</div><!-- .entry-meta -->
	
						<div class="entry-content">
							
							<?php print substr(get_the_excerpt(), 0, strrpos(get_the_excerpt(), "<a")-1); ?>
							
							<div>
							<?php
								if (function_exists('display_related_posts_via_categories')):
									display_related_posts_via_categories();
								endif;
							
							the_post_thumbnail('full');
							?>
							</div> <!-- Fin del div -->
		
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'coraline' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-content -->
	
						</div><!-- #post-## -->
	
						<div>COMENTARIOS</div>
			
						<?php comments_template( '', true ); ?>
					</div><!-- #content-post -->
				<?php	
				endif;
				?>
	
				<?php endwhile; // end of the loop. ?>
				
			</div><!-- #content -->
<aside>
<?php //get_sidebar(); ?>
	<div id="single_sidebar" >  
     	<?php // The primary sidebar used in all internal pages
        if (  ! dynamic_sidebar( 'single-sidebar-widget-area' ) ) : ?>
        	<?php endif; // end primary widget area ?>
     </div> <!-- #single_sidebar -->
</aside>

<?php get_footer(); ?>