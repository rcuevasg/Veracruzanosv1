<?php
/**
 * @package WordPress
 * @subpackage Coraline
 * @since Coraline 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if (!IE)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'coraline' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href='http://fonts.googleapis.com/css?family=Enriqueta:400,700|Magra:400,700' rel='stylesheet' type='text/css'>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
		
	include "weather.php";

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>

<body <?php body_class(); ?>>
<div id="container">
<?php do_action( 'before' ); ?>
	<header>
	
		<!-- topheader: date and weather -->
		<section id="tophead">
	
			<div id="box_data"><!--div box_data -->
				<div class="date">
					<?php 
					print obtenFechaEspaniol();
					?>
					|
				</div>	

				<div class="weather"><!-- weather -->   
	                	<form action="#">
	                	 	<div class="weather_info" id="weather_info"></div>
	                        <div class="select_city">
	                        	<select id="select01" onchange = "getTemps(this);">
	                        		<option value="0">Cambiar Ciudad </option>
	                        		<option value="veracruz">Veracruz </option>
	                        		<option value="jalapa">Xalapa </option>
	                        		<option value="tuxpan">Tuxpan </option>
	                        		<option value="cordoba+veracruz">C&oacute;rdoba </option>
	                        		<option value="poza+rica">Poza Rica </option>
	                        		<option value="orizaba+veracruz">Orizaba </option>
	                        		<option value="coatzacoalcos">Coatzacoalcos </option>
									<option value="minatitlan">Minatitl&aacute;n </option>
	                        	</select>
	                        	<script type= "text/javascript">getTempsInit();</script>
	                        </div>
	                    </form>
	                </div><!-- end weather-->
			</div><!-- end box_data-->
		<?php
			wp_nav_menu( array( 'theme_location' => 'header', 'sort_column' => 'menu_order', 'container_class' => 'header_nav', 'container' =>'nav', 'container_class' => 'menu_header' ) );
		?>
		</section><!-- end tophead -->
		
		<!-- masterhead: logo, social menu and description -->
		<section id="masthead" role="banner">
			
			<!-- Inicio del menu de Redes sociales -->
			<?php
			wp_nav_menu( array( 'theme_location' => 'socialNetwork', 'sort_column' => 'menu_order', 'container_class' => 'social_nav', 'container_class' => 'menu_social', 'container' =>'nav'  ) );
			?>
			<!-- end menu redes sociales-->
			
			<!-- Inicio search form -->
			<?php get_search_form(); ?>
			<!-- end search form -->
			
			<hgroup role="heading">
				<?php $heading_tag = ( is_home() || is_front_page() ) ? 'h1' : 'div'; ?>
				<<?php echo $heading_tag; ?> id="site-title">
						<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</<?php echo $heading_tag; ?>>
				<h2 id="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>
		</section><!-- #masthead -->

		<nav id="access" role="navigation">
		  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
			<div class="skip-link screen-reader-text">
			<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'coraline' ); ?>"><?php _e( 'Skip to content', 'coraline' ); ?></a>
			</div>
			<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
			<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary', 'container' =>'nav' ) ); ?>
		</nav><!-- #access -->

		<section id="branding">
			<?php
				// Check to see if the header image has been removed
				if ( get_header_image() != '' ) :
			?>
			<a href="<?php echo home_url( '/' ); ?>">
				<?php
					// The header image
					// Check if this is a post or page, if it has a thumbnail, and if it's a big one
					if ( is_singular() &&
							has_post_thumbnail( $post->ID ) &&
							( /* $src, $width, $height */ $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-thumbnail' ) ) &&
							$image[1] >= HEADER_IMAGE_WIDTH ) :
						// Houston, we have a new header image!
						echo get_the_post_thumbnail( $post->ID, 'post-thumbnail' );
					else : ?>
					<img src="<?php header_image(); ?>" width="<?php echo HEADER_IMAGE_WIDTH; ?>" height="<?php echo HEADER_IMAGE_HEIGHT; ?>" alt="" />
				<?php endif; // end check for featured image or standard header ?>
			</a>
			<?php endif; // end check for removed header image ?>
		</section><!-- #branding -->
	</header><!-- #header -->

	<div id="content-box" role= "main">
