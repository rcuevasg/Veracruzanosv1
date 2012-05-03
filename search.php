<?php
/**
 * @package WordPress
 * @subpackage Coraline
 * @since Coraline 1.0
 */

get_header(); ?>

			<div id="content" role="main">

			<?php if ( have_posts() ) : ?>
				<h1 class="page-title"><?php printf( __( 'Resultados para: %s', 'coraline' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php get_template_part( 'loop', 'search' ); ?>
			<?php else : ?>
				<div id="post-0" class="post no-results not-found">
					<h4 class="entry-title"><?php _e( 'No hemos encontrado ningún resultado para tu búsqueda.', 'coraline' ); ?></h4>
					<div class="entry-content">
						<p><?php _e( '<h5>Intenta nuevamente con alguna de estas sugerencias:</h5><ul><li> Asegúrate de escribir todas las palabras correctamente.</li><li> Prueba con distintas palabras clave.</li></ul>', 'coraline' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-0 -->
			<?php endif; ?>
			</div><!-- #content -->

<?php get_sidebar('list'); ?>
<?php get_footer(); ?>