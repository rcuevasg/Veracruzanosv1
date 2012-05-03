<?php
/**
 * @package WordPress
 * @subpackage Coraline
 * @since Coraline 1.0
 */

get_header(); ?>

			<div id="content" role="main">
			
			<!-- <div id="breadcrumbs">
				<?php //coraline_posted_in(); ?>
			</div> -->
			
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
				<?php
				if (in_category('veracruzanos-tv')):
					include(TEMPLATEPATH.'/single-veracruzanos-tv.php');
				elseif (in_category('la-entrevista')):
					include(TEMPLATEPATH.'/single-la-entrevista.php');
				else:
					//Estamos viendo una noticia que no entra dentro de las categorias anteriores así que se muestra como una nota normal
					?>
					<div id="content-post">
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h1 class="entry-title"><?php the_title(); ?></h1>
	
						<div class="entry-meta">
							<?php $autorNota = get_post_meta($post->ID, 'autor', true); ?>
							<?php $ciudadNota = get_post_meta($post->ID, 'ciudad', true); ?>
							<?php if (!empty($ciudadNota)): print $ciudadNota . " "; endif; coraline_posted_on(); ?> | <?php if (!empty($autorNota)) : print "Por " . $autorNota; endif; ?>
						</div><!-- .entry-meta -->
	
						<div class="entry-content">
							
							<h4><?php print substr(get_the_excerpt(), 0, strrpos(get_the_excerpt(), "<a")-1); ?></h4>
							
							<div class="mar-top-20">
							
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
								
							</div> <!-- Fin del div -->
						
							
							<div class="box-add">
							  <!--aqui deberia ir compartir y relacionados -->
							 
							</div>
							
							
							<?php the_content(); ?>
							
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'coraline' ), 'after' => '</div>' ) ); ?>
							
							</div>
							
						</div><!-- .entry-content -->
	
						</div><!-- #post-## -->
						
						
						
						<div id="title-comments">
							<h3>COMENTARIOS</h3>
						</div>
			
						<?php comments_template( '', true ); ?>
					</div><!-- #content-post -->
				<?php	
				endif;
				?>
	
				<?php endwhile; // end of the loop. ?>
				
			</div><!-- #content -->


<?php get_sidebar('single'); ?>

<?php get_footer(); ?>