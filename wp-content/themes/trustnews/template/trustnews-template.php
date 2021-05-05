<?php
/**
 * Template Name: Home Template
 *
 * @package trustnews
 * 
 */

get_header();
$trustnews_standart_section_position = get_theme_mod ('standart_section_position','bottom');

if ( $trustnews_standart_section_position == 'top'){

	/*
	 * Standard Section
	 */

	do_action ('trustnews_frontend_standard_section');
}


?>

<div class="main-section">
	<div class="wrap">
		<div id="main-content-area" class="main-content-area">
			<div class="main-content-holder">
				<?php

					if ( is_active_sidebar( 'trustnews-template-main' ) ) {
						dynamic_sidebar( 'trustnews-template-main' );
					}
				?>
			</div><!-- .main-content-holder -->
		</div><!-- .main-content-area -->
		
		<?php
			if ( is_active_sidebar( 'trustnews-template-primary' ) ) { ?>
				<aside id="left-widget-area" class="left-widget-area" role="complementary" aria-label="<?php esc_attr_e('Template Left','trustnews'); ?>">
					<div class="theiaStickySidebar">

						<?php dynamic_sidebar( 'trustnews-template-primary' ); ?>

					</div>
				</aside><!-- .left-widget-area -->

		<?php }

		if ( is_active_sidebar( 'trustnews-template-secondary' ) ) { ?>
			<aside id="right-widget-area" class="right-widget-area" role="complementary" aria-label="<?php esc_attr_e('Template Right','trustnews'); ?>">
				<div class="theiaStickySidebar">

					<?php dynamic_sidebar( 'trustnews-template-secondary' ); ?>

				</div>
			</aside><!-- .right-widget-area -->

		<?php } ?>
	</div><!-- .wrap -->
</div><!-- .main-section -->

<?php
if ( $trustnews_standart_section_position == 'bottom'){

	/*
	 * Standard Section
	 */

	do_action ('trustnews_frontend_standard_section');
}

get_footer();