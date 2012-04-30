<?php
/**
 * @package WordPress
 * @subpackage Coraline
 * @since Coraline 1.0
 */
?>

	<div id="main-sidebars">
	
		<div id="single_sidebar" >  
     	<?php // The single sidebar used in all internal pages
        if (  ! dynamic_sidebar( 'single-sidebar-widget-area' ) ) : ?>
        	<?php endif; // end single widget area ?>
        </div> <!-- #single_sidebar -->	
        	
    </div><!-- #main-sidebars -->

