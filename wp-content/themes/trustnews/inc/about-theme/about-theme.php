<?php
/**
 * Add the about page under appearance.
 *
 * Display the details about the theme information
 *
 * @package trustnews
 */
?>
<?php
// About Information
add_action( 'admin_menu', 'trustnews_about' );
function trustnews_about() {    	
	add_theme_page( esc_html__('About Theme', 'trustnews'), esc_html__('About Theme', 'trustnews'), 'edit_theme_options', 'trustnews-about', 'trustnews_about_page');   
}

// CSS for About Theme Page
function trustnews_admin_theme_style($hook) {
	if ( 'appearance_page_trustnews-about' != $hook ) {
		return;
	}
   wp_enqueue_style('trustnews-admin-style', get_template_directory_uri() . '/inc/about-theme/css/about-theme.css');
}
add_action('admin_enqueue_scripts', 'trustnews_admin_theme_style');

function trustnews_about_page() {
	$theme = wp_get_theme();

?>
<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php /* translators: %s theme name */
				printf( esc_html__( 'Welcome to %s', 'trustnews' ), esc_html( $theme->Name ) ); ?>
				<?php esc_html_e('Version:','trustnews'); ?> <?php echo esc_html($theme['Version']);?></h3>
				<p>
					<?php esc_html_e('TrustNews is a Limitless WordPress News and Magazine Template with a clean, modern design suitable for everyone who wants to share their stories on news, newspaper, magazine, publishing, blog or review sites. It comes with exclusive features and a modern eye cache design. TrustNews is the perfect tool for WordPress beginners and seasoned bloggers. It is a lightweight theme, optimized for the speed and fast loads. It also include all major aspects like responsive, performance, cross-browser compatible, SEO ready and supports RTL.','trustnews'); ?>
				</p>
				<p>
				<?php /* translators: %s theme name */
					printf( esc_html__( '%s theme is designed with passion. Please click the below button to display how your site looks like', 'trustnews' ), esc_html( $theme->Name ) );
				?></p>
				<p> &nbsp;</p>
				<a href="<?php echo esc_url('https://demo.themespiral.com/trustnews'); ?>" class="button button-primary button-hero about-theme" target="_blank"><?php esc_html_e( 'Visit Free Demo', 'trustnews' ); ?></a> &nbsp; <a href="<?php echo esc_url('https://demo.themespiral.com/trustnews-pro'); ?>" class="button button-primary button-hero about-theme" target="_blank"><?php esc_html_e( 'Visit Pro Demo', 'trustnews' ); ?></a>
		</div>
		<div class="theme-tabs">
			<input type="radio" name="nav" id="one" checked="checked"/>
			<label for="one" class="tab-label"><?php esc_html_e('Getting Started?','trustnews');?></label>

			<input type="radio" name="nav" id="two"/>
			<label for="two" class="tab-label"><?php esc_html_e('Demo Importer','trustnews');?></label>

			<input type="radio" name="nav" id="three"/>
			<label for="three" class="tab-label"><?php esc_html_e('Support','trustnews');?></label>

			<input type="radio" name="nav" id="four"/>
			<label for="four" class="tab-label"><?php esc_html_e('Setup Section','trustnews');?></label>

			<input type="radio" name="nav" id="five"/>
			<label for="five" class="tab-label"><?php esc_html_e('Pro Features','trustnews');?></label>

			<article class="content one">
			    <h3><?php esc_html_e('About Documentation','trustnews');?></h3>
			    <p><?php esc_html_e('Documentation is the information that describes the product to its users. Our documentation covers only related to Free Themes and Pro Extension Plugins. It will guide your to develop your Website as we displayed in demo site without any others help.','trustnews');?></p>
			    <p>
					<a href="<?php echo esc_url('https://docs.themespiral.com/trustnews/');?>" target="_blank" class="button button-primary"><?php printf( esc_html__( '%s Documentation', 'trustnews' ), esc_html( $theme->Name ) ); ?></a>
				</p>
				<h3><?php esc_html_e('Theme Customizer','trustnews');?></h3>
			   <p><?php printf( esc_html__( '%s supports the Theme Customizer for all theme settings. Click "Customize" to personalize your site.', 'trustnews' ), esc_html( $theme->Name ) ); ?>
			   	<a href="<?php echo esc_url(admin_url( 'customize.php' )); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Start Customizing','trustnews');?></a>
				</p>
				<h3><?php esc_html_e('F.A.Q (Frequently Asked Questions)','trustnews');?></h3>
			   <p><?php esc_html_e('Want to know more about Themes and Plugins developed by Theme Spiral? ','trustnews'); ?><a href="<?php echo esc_url('https://themespiral.com/f-a-q/');?>" class="button button-primary" target="_blank"><?php esc_html_e('F.A.Q','trustnews');?></a></p>
				<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
			</article>

			<article class="content two">
			    <h3><?php esc_html_e('Demo Importer','trustnews');?></h3>
				<p>
					<?php esc_html_e( 'If your site have your own content then do not use this plugins to import dummy content. It will mess your site with dummy content. Is your site fresh? Install the Demo importer plugins and activate it.', 'trustnews' ); ?></p>
				<p><?php esc_html_e('Do you want to install One Click Demo Import Plugin? ','trustnews'); ?></p>
					<?php if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) { ?>
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ) ?>" class="button button-primary" style="text-decoration: none;">
						<?php esc_html_e( 'Install Demo Plugin', 'trustnews' ); ?>
					</a>
				<?php } else { ?>
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) ?>" class="button button-primary" style="text-decoration: none;">
						<?php esc_html_e( 'Install Demo Plugin', 'trustnews' ); ?>
					</a>
				<?php } ?> &nbsp;&nbsp;

				<h3><?php esc_html_e('How to install Dummy Content ?','trustnews');?></h3>

				<p><?php esc_html_e(' Please install One Click Demo Import plugins. You can install it after activating trustnews theme. It is listed in recommended Plugins','trustnews'); ?></p>
				<ul>
					<li><?php esc_html_e('After plugin is activated, it asks you to upload  XML, WIE and  DAT dummy file','trustnews');?></li>
					<li><a href="https://themespiral.com/download-dummy-content/" target="_blank"><?php esc_html_e('Download it from Here ','trustnews');?></a></li>
					<li><?php esc_html_e('Unzip trustnews-dummy-content.zip file. You can find all XML, WIE and  DAT dummy file','trustnews');?></li>
					<li><?php esc_html_e('Navigate to Appearance > Import Demo Data','trustnews');?> 
					<?php if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) { ?> <a href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ) ?>"><?php esc_html_e('Upload','trustnews'); ?></a><?php } ?></li>
					<li><?php esc_html_e('Upload manually and Click on Import demo data.','trustnews');?></li>
					<li><?php esc_html_e('Now all your images, text has been imported. Now you just need to setup your menu, widgets, Banner and front page.','trustnews');?></li>
				</ul>
				<p><strong><?php esc_html_e('Setup Menu:','trustnews');?> </strong></p>
				
				<ul>
					<li><?php esc_html_e('In the Blog Dashboard, select Appearance > Menus.','trustnews');?></li>
					<li><?php esc_html_e('Under the Menu Settings, located at the bottom of your screen, select Primary/ Secondary menu','trustnews');?></li>
					<li><?php esc_html_e('Click save menu','trustnews');?></li>
				</ul>
				<p><strong><?php esc_html_e('Setup Home Page:','trustnews');?></strong></p>
				<ul>
					<li><?php esc_html_e('Navigate to Dashboard > Reading > Click on ( A static page ) from Your homepage displays','trustnews');?></li>
				
				<li><?php esc_html_e('Select Homepage as Home and Postpage as Blog','trustnews');?></li>
			</ul>
			</article>

			<article class="content three">
			   <h3><?php esc_html_e('About Support','trustnews');?></h3>
				<p><?php esc_html_e('Need Help? Use our Forums if you have any Themes and Plugins related questions. Support will be provided only related to our Themes and Plugins','trustnews');?>
					<a href="<?php echo esc_url('https://themespiral.com/forums/'); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Forums','trustnews');?></a>
				</p>
				<h3><?php esc_html_e('Sales Questions','trustnews');?></h3>
				<p><?php esc_html_e('Do you have discussion relating to billing, your account or have pre-sales questions? Get touch with us!','trustnews');?>
					<a href="<?php echo esc_url('https://themespiral.com/contact-us/');?>" target="_blank" class="button button-primary"> <?php esc_html_e('Contact us','trustnews');?></a>
				</p>
			   <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
			</article>

			<article class="content four">
			   <h3><?php esc_html_e('Setup Sections','trustnews');?></h3>
				<h4> <?php esc_html_e('Setup Site Identity','trustnews'); ?></h4>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=title_tagline')); ?>"></span><?php esc_html_e( 'Site Identity', 'trustnews' ); ?></a>

				<h4> <?php esc_html_e('Setup Main Banner','trustnews'); ?></h4>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=trustnews_main_banner_section')); ?>"></span><?php esc_html_e( 'Main Banner', 'trustnews' ); ?></a>

				<h4> <?php esc_html_e('Setup Social Icons','trustnews'); ?></h4>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url())?>nav-menus.php"></span><?php esc_html_e( 'Social Icons', 'trustnews' ); ?></a>

				<h4> <?php esc_html_e('Setup Primary Menu','trustnews'); ?></h4>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url())?>nav-menus.php"></span><?php esc_html_e( 'Primary Menu', 'trustnews' ); ?></a>

				<h4> <?php esc_html_e('Setup Header','trustnews'); ?></h4>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=header_image')); ?>"></span><?php esc_html_e( 'Setup Header', 'trustnews' ); ?></a>
			</article>

			<article class="content five">
				 <h3><?php esc_html_e('Upgrade to Pro','trustnews');?></h3>
				 <p><?php esc_html_e('Want additional features? Pro extension plugin adds additinal features for free themes. ','trustnews')?><a href="<?php echo esc_url('https://themespiral.com/themes/trustnews');?>" class="button button-primary button-hero" target="_blank"><?php esc_html_e('Upgrade to Pro','trustnews');?></a></p>
			   <h3><?php esc_html_e('Pro Features Extension','trustnews');?></h3>
				<div class="feature-content">
					<ul class="feature-text">
						<li><?php esc_html_e('Site Layout','trustnews'); ?></li>
						<li><?php esc_html_e('Single Sidebar Layout','trustnews'); ?></li>
						<li><?php esc_html_e('Flexible Content Width','trustnews'); ?></li>
						<li><?php esc_html_e('Sidebar Content Width','trustnews'); ?></li>
						<li><?php esc_html_e('Custom Design','trustnews'); ?></li>
						<li><?php esc_html_e('Default Text Edit','trustnews'); ?></li>
						<li><?php esc_html_e('Choose Main Banner','trustnews'); ?></li>
						<li><?php esc_html_e('Category highlight settings','trustnews'); ?></li>
						<li><?php esc_html_e('Excerpt Text edit','trustnews'); ?></li>
						<li><?php esc_html_e('Footer Layout','trustnews'); ?></li>
						<li><?php esc_html_e('Unlimited Color','trustnews'); ?></li>
						<li><?php esc_html_e('Font Color','trustnews'); ?></li>
						<li><?php esc_html_e('Color Schemes','trustnews'); ?></li>
						<li><?php esc_html_e('Background Color','trustnews'); ?></li>
						<li><?php esc_html_e('Font Size','trustnews'); ?></li>
						<li><?php esc_html_e('Font Family','trustnews'); ?></li>
						<li><?php esc_html_e('Footer Column 1/2/3/4','trustnews'); ?></li>
						<li><?php esc_html_e('More Social Icons','trustnews'); ?></li>
						<li><?php esc_html_e('Change Featured Text in Sticky Post','trustnews'); ?></li>
						<li><?php esc_html_e('Standard Section','trustnews'); ?></li>
						<li><?php esc_html_e('Standard Section Column 3/4/5','trustnews'); ?></li>
					</ul>
			    </div><!-- .feature-content -->
			</article>
		</div>
		<div class="pro-content">
			<div class="pro-content-wrap">
				<div class="pro-content-header">
					<h3><?php esc_html_e('Powerful Pro Extension Features','trustnews');?></h3>
					<p><?php esc_html_e('Get unlimited features using Pro extension. Purchase TrustNews Pro extension and get additional features and advanced customization options to make your website look awesome in different styles. ','trustnews'); ?></p>
				</div>
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/free_vs_pro.png" alt="<?php esc_attr_e('Free vs Pro','trustnews');?>">
			</div>
		</div>
	</div>
</div>
<?php }