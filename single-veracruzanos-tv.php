<div id="content-post">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	
		<div class="entry-meta">
			<?php coraline_posted_on(); ?>
							
		</div><!-- .entry-meta -->
	
		<div class="entry-content">
			<div class="video">
				Si aparece esto esta llamando a la plantilla correcta y el error es otro
				<?php
				$urlVideo = substr(get_the_excerpt(), 0, strrpos(get_the_excerpt(), "<a")-1);
				global $smart_youtube_pro;
				print $smart_youtube_pro->check( $urlVideo, 1);
				?>
			</div> <!-- Fin del div video -->
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'coraline' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
	
	</div><!-- #post-## -->
	
	<div>COMENTARIOS</div>
		
	<?php comments_template( '', true ); ?>
</div><!-- #content-post -->