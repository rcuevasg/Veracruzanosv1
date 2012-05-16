<?php
/**
 * @package WordPress
 * @subpackage Coraline
 * @since Coraline 1.0
 */
?>
	</section><!-- #content-box -->

	<footer role="contentinfo">
		<?php get_sidebar( 'footer' ); ?>

		<div id="colophon">
			<?php printf( __( 'Code and design %1$s by %2$s', 'coraline' ), 'Veracruzanos', '<a target="_blank" href="http://www.webdevstudio.com.mx/" rel="designer">WebDev Studio & Floristeady</a>.' ); ?> <span class="generator-link"><a href="<?php echo esc_url( __( 'http://wordpress.org/', 'coraline' ) ); ?>" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'coraline' ); ?>" rel="generator"><?php printf( __( '%s.', 'coraline' ), 'WordPress' ); ?></a></span>
		</div><!-- #colophon -->
	</footer><!-- #footer -->

</div><!-- #container -->

<?php wp_footer(); ?>
</body>
</html>