<?php
/**
 * @package WordPress
 * @subpackage Coraline
 * @since Coraline 1.0
 */

get_header(); ?>

		<div id="content" role="main">

			<div id="post-0" class="post error404 not-found">
				<h4 class="entry-title"><?php _e( 'No se encontró la página.', 'coraline' ); ?></h4>
				<div class="entry-content">
					<p><?php _e( '<h5>Puede ser que la página que buscas tenga una nueva ubicación o ya no este disponible.</h5></br>Algunas sugerencias: <ul><li>Vuelve a la página de <a alt="Ir a página de inicio" href="http://www.veracruzanos.info"> Inicio.</a></li><li>Comprueba que la dirección a la que intentas acceder este escrita correctamente.</li><li>Utiliza el búscador</li>', 'coraline' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</div><!-- #post-0 -->

		</div><!-- #content -->
		
	<script type="text/javascript">
		// focus on search field after it has loaded
		document.getElementById('s') && document.getElementById('s').focus();
	</script>

<?php get_footer(); ?>