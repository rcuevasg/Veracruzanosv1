<?php
/**
 * @package WordPress
 * @subpackage Coraline
 * @since Coraline 1.0
 */

get_header(); ?>

			<div id="content" role="main">
			
			<div id="breadcrumbs">
				<?php coraline_posted_in(); ?>
			</div>

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="content-post">
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h1 class="entry-title"><?php the_title(); ?></h1>
	
						<div class="entry-meta">
							<?php coraline_posted_on(); ?> 
							<span class="autor">Por <span>Nombre Apellido</span></span>
							<?php edit_post_link( __( 'Edit', 'coraline' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?><? coraline_posted_by(); ?>
							
						</div><!-- .entry-meta -->
	
						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'coraline' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-content -->
	
					</div><!-- #post-## -->
		
					<?php comments_template( '', true ); ?>
	
				<?php endwhile; // end of the loop. ?>
				</div><!-- #content-post -->
			</div><!-- #content -->
<aside>
<?php get_sidebar(); ?>
</aside>

<?php get_footer(); ?>