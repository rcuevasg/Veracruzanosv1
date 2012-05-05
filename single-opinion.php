<!-- Navegacion -->
<?php include(TEMPLATEPATH.'/includes/breadcumb.php'); ?> 
<!-- Fin navegacion -->

<div id="content-post" class="opinion">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	
		<div class="entry-meta">
							<?php $autorNota = get_post_meta($post->ID, 'autor', true); ?>
							<?php $ciudadNota = get_post_meta($post->ID, 'ciudad', true); ?>
							<?php if (!empty($ciudadNota)): print $ciudadNota . " | "; endif; coraline_posted_on(); ?>  
							<?php if (!empty($autorNota)) : print " | Por " . $autorNota; endif; ?>
						</div><!-- .entry-meta -->
		<div class="opinion_info clearfix">
		<?php
			//Imagen del autor
			ciii_category_images(); 
		?>
		<span class="autor"><?php if (!empty($autorNota)) : print "Por " . $autorNota; endif; ?></span>
		</div>
		<div class="entry-content clearfix">
			
			 <!-- botones redes sociales -->
				<?php include(TEMPLATEPATH . "/includes/share.php");  ?> 	
			  <!-- Fin botones redes sociales -->
							
							
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'coraline' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
	
	</div><!-- #post-## -->
	
	<div class="clearfix"></div>
		
	<div id="title-comments" class="clearfix">
		<h3>COMENTARIOS</h3>
	</div>
		
	<?php comments_template( '', true ); ?>
</div><!-- #content-post -->