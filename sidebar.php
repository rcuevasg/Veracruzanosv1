<?php
/**
 * @package WordPress
 * @subpackage Coraline
 * @since Coraline 1.0
 */
?>

	<div id="main-sidebars">
		<div id="primary" class="widget-area" role="complementary">
	
			<ul class="widget_list">

			<?php // The primary sidebar used in home
			if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				<li id="search" class="widget-container widget_search">
					<h3 class="widget-title"><?php _e( 'Search It!', 'coraline' ); ?></h3>
					<?php get_search_form(); ?>
				</li>

				<li class="widget-container">
					<h3 class="widget-title"><?php _e( 'Recent Entries', 'coraline' ); ?></h3>
						<ul>
							<?php
							$recent_entries = new WP_Query();
							$recent_entries->query( 'order=DESC&posts_per_page=10' );

							while ($recent_entries->have_posts()) : $recent_entries->the_post();
								?>
								<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
								<?php
							endwhile;
							?>
						</ul>
				</li>

				<li class="widget-container">
					<h3 class="widget-title"><?php _e( 'Links', 'coraline' ); ?></h3>
						<ul>
							<?php wp_list_bookmarks( array( 'title_li' => '', 'categorize' => 0 ) ); ?>
						</ul>
				</li>

			<?php endif; // end primary widget area ?>
			</ul>
		</div><!-- #primary .widget-area -->
		
		
		<?php if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

	    <div id="secondary" class="widget-area" role="complementary">
			<ul class="widget_list">
			<?php // A second sidebar for widgets. Coraline uses the secondary widget area for three column layouts.
			if ( ! dynamic_sidebar( 'secondary-widget-area' ) ) : ?>

			<?php endif; ?>
			</ul>
		</div><!-- #secondary .widget-area -->
		
		<?php endif; ?>
		

		<?php if ( is_active_sidebar( 'banner-widget-area' ) ) : ?>

		<div id="banner-sidebar" class="widget-area" role="complementary">
			<ul class="widget_list">
				<?php dynamic_sidebar( 'banner-widget-area' ); ?>
			</ul>
		</div><!-- #feature.widget-area -->

		<?php endif; // ends the check for the current layout that determines the availability of the feature widget area ?>

		
		</div><!-- #main-sidebars -->

