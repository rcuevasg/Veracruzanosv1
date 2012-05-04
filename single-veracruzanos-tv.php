<div id="content-post" class="vertv">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	
		<div class="entry-meta">
			<?php $autorNota = get_post_meta($post->ID, 'autor', true); ?>
			<?php $ciudadNota = get_post_meta($post->ID, 'ciudad', true); ?>
			<?php if (!empty($ciudadNota)): print $ciudadNota . " "; endif; coraline_posted_on(); ?> | <?php if (!empty($autorNota)) : print "Por " . $autorNota; endif; ?>
		</div><!-- .entry-meta -->
	
		<div class="entry-content">
		
			 <!-- botones redes sociales -->
				<?php include(TEMPLATEPATH . "/includes/share.php");  ?> 	
			  <!-- Fin botones redes sociales -->

		
			<div class="video">
				<?php
				$urlVideo = substr(get_the_excerpt(), 0, strrpos(get_the_excerpt(), "<a")-1);
				global $smart_youtube_pro;
				$urlVideo = str_replace("http://", "httpvh://", $urlVideo);
				print $smart_youtube_pro->check( $urlVideo, 0);
				?>
			</div> <!-- Fin del div video -->
			
			<div class="box-add">
			  <!--aqui deberia ir compartir y relacionados -->
			<?php
				//do_action( 'erp-show-related-posts', array( $this, 'relatedPosts' ) );
			?>
			</div>
							
							
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'coraline' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
	
	</div><!-- #post-## -->
	
		
	<div id="title-comments">
		<h3>COMENTARIOS</h3>
	</div>
		
	<?php comments_template( '', true ); ?>
</div><!-- #content-post -->