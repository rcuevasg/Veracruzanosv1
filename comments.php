<?php
/**
 * @package WordPress
 * @subpackage Coraline
 * @since Coraline 1.0
 */
?>

<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'coraline' ); ?></p>
	</div><!-- #comments -->
	<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 id="comments-title"><?php printf( _n( 'Un comentario en %2$s', '%1$s comentarios en %2$s', get_comments_number(), 'coraline' ), number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<div class="navigation">
			<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Ver comentarios anteriores', 'coraline' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Ver comentarios más recientes <span class="meta-nav">&rarr;</span>', 'coraline' ) ); ?></div>
		</div> <!-- .navigation -->
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'coraline_comment' ) ); ?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<div class="navigation">
			<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Ver comentarios anteriores', 'coraline' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Ver comentarios más recientes <span class="meta-nav">&rarr;</span>', 'coraline' ) ); ?></div>
		</div><!-- .navigation -->
		<?php endif; // check for comment navigation ?>

	<?php else : // or, if we don't have comments:

		/* If there are no comments and comments are closed,
		 * let's leave a little note, shall we?
		 * But only on posts! We don't really need the note on pages.
		 */
		if ( ! comments_open() && ! is_page() ) :
		?>
		<p class="nocomments"><?php _e( 'Los comentarios están cerrados para esta nota.', 'coraline' ); ?></p>
		<?php endif; // end ! comments_open() ?>

	<?php endif; // end have_comments() ?>

	<?php comment_form(); ?>

</div><!-- #comments -->