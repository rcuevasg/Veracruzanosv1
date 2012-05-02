<div id="content-post">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	
		<div class="entry-meta">
			<?php coraline_posted_on(); ?> | Por <?php print get_post_meta($post->ID, 'autor', true); ?>
							
		</div><!-- .entry-meta -->
	
		<div class="entry-content">
			<div class="la-entrevista">
				<?php
				the_post_thumbnail('medium');
				$urlVideo = get_post_meta($post->ID, 'video', true);
				//$urlVideo = substr(get_the_excerpt(), 0, strrpos(get_the_excerpt(), "<a")-1);
				global $smart_youtube_pro;
				print $smart_youtube_pro->check( $urlVideo, 0);
				?>
			</div> <!-- Fin del div video -->
			<span>Semblanza del personaje</span>
			<?php print substr(get_the_excerpt(), 0, strrpos(get_the_excerpt(), "<a")-1); ?>
			<span>La entrevista</span>
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'coraline' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
	
	</div><!-- #post-## -->
	
		<div id="title-comments">
					<h3>COMENTARIOS</h3>
	    </div>
		
	<?php comments_template( '', true ); ?>
</div><!-- #content-post -->