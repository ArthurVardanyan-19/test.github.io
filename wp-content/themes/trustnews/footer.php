<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package trustnews
 */

?>
<?php
$go_top = get_theme_mod('disable-go-top','trustnews');

?>
		</div><!-- .site-content-cell -->
	</div><!-- #content -->
	<?php
	/**
	 * Instagram Feed
	 */
	do_action('trustnews_frontend_instagram_feed'); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">

			<?php 
				/**
				 * Footer settings and Options
				 */
				do_action ('trustnews_frontend_footer_settings'); 
			?>

		<div class="copyright-area">
			<div class="wrap">
				<?php
					if ( has_nav_menu( 'menu-4' ) ) { ?>
						<nav class="footer-menu-container" role="navigation" aria-label="<?php esc_attr_e('Footer Menu','trustnews'); ?>">

							<?php
								wp_nav_menu( array(
									'container' =>'',
									'theme_location' => 'menu-4',
									'menu_id'        => 'primary-menu',
									'items_wrap'      => '<ul class="footer-menu">%3$s</ul>',
								) );
							?>

						</nav>
						<?php } ?>
				<div class="site-info">
					<?php 

						/**
						 * Footer Copyright
						 */
						do_action ('trustnews_footer_copyright_frontend');
					?>
				</div><!-- .site-info -->
					<?php
						if ( function_exists( 'the_privacy_policy_link' ) ) { ?>
							<div class="footer-right-info">
								<?php the_privacy_policy_link(); ?>
							</div>
						<?php }
					?>
			</div><!-- .wrap -->
		</div><!-- .copyright-area -->
	</footer><!-- #colophon -->
	<?php if( $go_top ==0 ) { ?>
		<button href="#" class="back-to-top" type="button"><i class="fas fa-long-arrow-alt-up"></i><?php esc_html_e('Go Top','trustnews'); ?></button>
	<?php }

	do_action ('trustnews_skin_hook_before'); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
