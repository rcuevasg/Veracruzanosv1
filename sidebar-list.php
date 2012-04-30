<?php
/**
 * @package WordPress
 * @subpackage Coraline
 * @since Veracruzanos 1.0
 */
?>

	<div id="main-sidebars">
	
		<div id="single_sidebar" >  
     	<?php // The primary sidebar used in all internal pages
        if (  ! dynamic_sidebar( 'single-sidebar-listado-widget-area' ) ) : ?>
        	<?php endif; // end primary widget area ?>
        </div> <!-- #single_sidebar -->	
        	
    </div><!-- #main-sidebars -->

