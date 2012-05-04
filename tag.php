<?php
/**
 * @package WordPress
 * @subpackage Coraline
 * @since Coraline 1.0
 */

get_header(); ?>


			<div id="content" role="main">

				<h1 class="page-title"><?php
					printf( __( 'Temas: %s', 'coraline' ), '<span>' . single_tag_title( '', false ) . '</span>' );
				?></h1>

				<?php get_template_part( 'loop', 'tag' ); ?>
			</div><!-- #content -->

<?php get_sidebar('list'); ?>

<?php get_footer(); ?>