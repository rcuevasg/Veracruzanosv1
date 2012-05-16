<?php
/**
 * @package WordPress
 * @subpackage Coraline
 * @since Coraline 1.0
 */
?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h4 class="entry-title"><?php _e( 'Página no encontrada.', 'coraline' ); ?></h4>
		<div class="entry-content">
			<p><?php _e( 'Puede ser que la página que buscas tenga una nueva ubicación o ya no este disponible. ', 'coraline' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php
	// Start the Loop.
	$options = coraline_get_theme_options(); while ( have_posts() ) : the_post(); ?>

<?php /* How to display posts in the Gallery category. */ ?>

	<?php if ( ( isset( $options['gallery_category'] ) && '0' != $options['gallery_category'] && in_category( $options['gallery_category'] ) ) || 'gallery' == get_post_format( $post->ID ) ) : ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'coraline' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

			<div class="entry-meta">
				<?php coraline_posted_on(); coraline_posted_by(); ?>
			</div><!-- .entry-meta -->

			<div class="entry-content">
			<?php if ( post_password_required() ) : ?>
				<?php print substr(get_the_content(),0, 300); ?>
			<?php else : ?>
				<?php
					$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
					if ( $images ) :
						$total_images = count( $images );
						$image = array_shift( $images );
						$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
				?>
						<div class="gallery-thumb">
							<a class="size-thumbnail" href="<?php the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
						</div><!-- .gallery-thumb -->
						<p><em><?php printf( __( 'This gallery contains <a %1$s>%2$s photos</a>.', 'coraline' ),
								'href="' . get_permalink() . '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'coraline' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
								$total_images
							); ?></em></p>
				<?php endif; ?>
					<?php the_excerpt(); ?>
			<?php endif; ?>
			</div><!-- .entry-content -->

			<div class="entry-info">
				<span class="comments-link"><?php comments_popup_link( __( '&rarr; Leave a comment', 'coraline' ), __( '&rarr; 1 Comment', 'coraline' ), __( '&rarr; % Comments', 'coraline' ) ); ?></span>

			<?php
				if ( isset( $options['gallery_category'] ) ) :
					$cat_slug = sanitize_title( $options['gallery_category'] );
					if ( in_category( $cat_slug ) ) :
			?>
				<p><a href="<?php echo get_term_link( $cat_slug, 'category' ); ?>" title="<?php esc_attr_e( 'View posts in the Gallery category', 'coraline' ); ?>"><?php _e( 'More Galleries', 'coraline' ); ?></a></p>
			<?php endif; endif; ?>

				<p><?php edit_post_link( __( 'Edit', 'coraline' ), '', '' ); ?></p>
			</div><!-- .entry-info -->
		</div><!-- #post-## -->

<?php /* How to display posts in the asides category */ ?>

	<?php elseif ( isset( $options['aside_category'] ) && '0' != $options['aside_category'] && in_category( $options['aside_category'] ) || 'aside' == get_post_format( $post->ID ) ) : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
			<div class="entry-summary aside">
				<?php print substr(get_the_content(),0 ,300);//the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content aside">
				<?php print substr(get_the_content(),0 ,300);//the_content( __( 'Continuar leyendo <span class="meta-nav">&rarr;</span>', 'coraline' ) ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>

			<div class="entry-info">
				<p class="comments-link"><?php comments_popup_link( __( '&rarr; Leave a comment', 'coraline' ), __( '&rarr; 1 Comment', 'coraline' ), __( '&rarr; % Comments', 'coraline' ) ); ?></p>
				<p><?php coraline_posted_on(); coraline_posted_by(); ?></p>
				<?php edit_post_link( __( 'Edit', 'coraline' ), '', '' ); ?>
			</div><!-- .entry-info -->
		</div><!-- #post-## -->

<?php /* How to display all other posts. */ ?>

	<?php else : ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Continuar leyendo %s', 'coraline' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>

			<div class="entry-meta">
				<?php $autorNota = get_post_meta($post->ID, 'autor', true); ?>
				<?php $ciudadNota = get_post_meta($post->ID, 'ciudad', true); ?>
				<?php if (!empty($ciudadNota)): print $ciudadNota . " | "; endif; coraline_posted_on(); ?>  
				<?php if (!empty($autorNota)) : print " | Por " . $autorNota; endif; ?>
			</div><!-- .entry-meta -->

			<div class="entry-summary">
				<?php 
					$resumen = substr(get_the_excerpt(),0,strrpos(get_the_excerpt(),"<a"));
					if (empty($resumen)):
						$resumen = substr(strip_tags(get_the_content(),0,400));
					endif;
				?>
				<p><?php print $resumen . "…"; ?> | <a href="<?php the_permalink(); ?>" title="Continuar leyendo <?php the_title() ?>"> Continuar leyendo » </a></p>
			</div><!-- .entry-summary -->
			
	<?php //if ( is_search() ) : // Display excerpts for search. ?>
			<!-- <div class="entry-summary">
				<?php //the_excerpt(); ?>
			</div>--><!-- .entry-summary -->
	<?php //else : ?>
			<!-- <div class="entry-content"> -->
				<?php //the_content( __( 'Continuar leyendo <span class="meta-nav">&rarr;</span>', 'coraline' ) ); ?>
				<?php //wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'coraline' ), 'after' => '</div>' ) ); ?>
			<!-- </div>--><!-- .entry-content -->
	<?php //endif; ?>

			<div class="entry-info">
					
				<?php if ( count( get_the_category() ) ) : ?>
					<p class="cat-links">
						<?php printf( __( '<span class="%1$s"><strong>La noticia pertenece a:</strong></span> %2$s', 'coraline' ), 'entry-info-prep entry-info-prep-cat-links', get_the_category_list( ', ' ) ); ?>
					</p>
				<?php endif; ?>
				<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
					<p class="tag-links">
						<?php printf( __( '<span class="%1$s"><strong>Tema:</strong></span> %2$s', 'coraline' ), 'entry-info-prep entry-info-prep-tag-links', $tags_list ); ?>
					</p>
				<?php endif; ?>
				<?php edit_post_link( __( 'Edit', 'coraline' ), '<p class="edit-link">', '</p>' ); ?>
			</div><!-- .entry-info -->
		</div><!-- #post-## -->

		<?php comments_template( '', true ); ?>

	<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>

<?php endwhile; // End the loop. Whew. ?>

<?php /* Display navigation to next/previous pages when applicable */ 
	if(function_exists('wp_pagenavi')) { 
		wp_pagenavi(); 
	}
?>