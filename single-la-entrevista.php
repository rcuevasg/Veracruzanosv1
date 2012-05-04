<div id="content-post" class="entrevista">
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
		
		
			<div class="img">
	 			
	 			<?php //Obtenemos la url de la imagen destacada
					$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'big'));
					$thumbnailsrc = "";
					if (!empty($domsxe))
						$thumbnailsrc = $domsxe->attributes()->src;
					if (!empty($thumbnailsrc)):
				?>
		 			<img src='<?php bloginfo('template_url') ?>/timthumb.php?src=<?php print $thumbnailsrc; ?>&w=378&h=240' border=0 />
	 			<?php
	 			endif;
	 			?>
						 			
			</div> <!-- Fin del div img -->

			<div class="video">
				<?php
				$urlVideo = get_post_meta($post->ID, 'video', true);
				//$urlVideo = substr(get_the_excerpt(), 0, strrpos(get_the_excerpt(), "<a")-1);
				global $smart_youtube_pro;
				print $smart_youtube_pro->check( $urlVideo, 0);
				?>
			</div> <!-- Fin del div video -->
			
			<div class="box-add">
				<!--aqui deberia ir compartir y relacionados -->
			<?php
				//do_action( 'erp-show-related-posts', array( $this, 'relatedPosts' ) );
			?> 
			</div>
			
			<div class="bio">
				<span class="subtitle">Semblanza del personaje</span>
				<?php print substr(get_the_excerpt(), 0, strrpos(get_the_excerpt(), "<a")-1); ?>
			</div>
			
			<span class="subtitle">La entrevista</span>
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'coraline' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
	
	</div><!-- #post-## -->
	
		<div id="title-comments" class="clearfix">
			<h3>COMENTARIOS</h3>
	    </div>
		
	<?php comments_template( '', true ); ?>
</div><!-- #content-post -->