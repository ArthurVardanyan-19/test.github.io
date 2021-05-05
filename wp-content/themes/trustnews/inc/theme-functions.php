<?php
/**
 * Theme Functions which enhance the theme by hooking into WordPress
 *
 * @package trustnews
 */


// Navigation Top
function trustnews_navigation_top(){ ?>
    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
        <span class="toggle-text"><?php esc_html_e('Menu','trustnews'); ?></span>
        <span class="toggle-bar"></span>
    </button>

    <?php
    wp_nav_menu( array(
        'container' =>'',
        'theme_location' => 'menu-1',
        'menu_id'        => 'primary-menu',
        'items_wrap'      => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>',
    ) );
}

add_action('trustnews_frontend_navigation_top','trustnews_navigation_top');

// Navigation Secondary
function trustnews_secondary_navigation(){ ?>
   <nav class="secondary-navigation" role="navigation" aria-label="<?php esc_attr_e('Secondary Navigation','trustnews'); ?>">
        <button class="secondary-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
            <span class="secondary-toggle-text"><?php esc_html_e('Menu','trustnews'); ?></span>
            <span class="secondary-toggle-bar"></span>
        </button>
        <?php
        wp_nav_menu( array(
            'container' =>'',
            'theme_location' => 'menu-3',
            'menu_id'        => 'primary-menu',
            'items_wrap'      => '<ul id="primary-menu" class="secondary-menu">%3$s</ul>',
        ) ); ?>
    </nav><!-- .secondary-navigation -->       
<?php }

add_action('trustnews_frontend_secondary_navigation','trustnews_secondary_navigation');

// Search Form 
function trustnews_search_form(){
    $search_text = get_theme_mod('search_text',esc_html__('Search','trustnews')); ?>
<div class="search-container-wrap">
    <div class="search-container">
        <form role="search" method="get" class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>"  role="search"> 
            <label for='s' class='screen-reader-text'><?php esc_html_e( 'Search', 'trustnews' ); ?></label> 
                <input class="search-field" placeholder="<?php echo esc_attr($search_text).'&hellip;'; ?>" name="s" type="search"> 
                <input class="search-submit" value="<?php echo esc_attr($search_text); ?>" type="submit">
        </form>
    </div><!-- .search-container -->
</div><!-- .search-container-wrap -->
    
<?php }
add_action('trustnews_frontend_search_form','trustnews_search_form');

// Social Navigation
function trustnews_social_navigation(){ ?>
    <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e('Social Navigation','trustnews'); ?>">
        <?php
       
            wp_nav_menu( array(
                'container' =>'',
                'theme_location' => 'menu-2',
                'menu_id'        => 'primary-menu',
                'items_wrap'      => '<ul class="social-links-menu">%3$s</ul>',
                'link_before'    => '<span class="screen-reader-text">',
                'link_after'     => '</span>',
            ) );
        ?>
    </nav><!-- .social-navigation -->

<?php }

add_action('trustnews_frontend_social_navigation','trustnews_social_navigation');

// Site Branding
function trustnews_site_branding(){ ?>
    <div class="site-branding">
        <?php the_custom_logo(); ?>
        <div class="site-branding-text">

            <?php if ( is_front_page() && is_home() ) : ?>
                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php
            else :
                ?>
                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php
            endif;
            $trustnews_description = get_bloginfo( 'description', 'display' );
            if ( $trustnews_description || is_customize_preview() ) :
                ?>
                <p class="site-description"><?php echo $trustnews_description; /* WPCS: xss ok. */ ?></p>
            <?php endif; ?>

        </div><!-- .site-branding-text -->
    </div><!-- .site-branding -->

<?php }

add_action('trustnews_frontend_site_branding','trustnews_site_branding');

// Main Banner
function trustnews_main_banner(){
$disable_main_banner = get_theme_mod('disable_main_banner',0);
$select_main_banner_category = get_theme_mod('select_main_banner_category','');
$no_of_main_banner = get_theme_mod('no_of_main_banner','6');
$slider_options = get_theme_mod('slider-options','main-banner');
$excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','trustnews'));
$excerpt_display = get_theme_mod('excerpt-display','excerpt-content');
$query = new WP_Query(array(
    'posts_per_page' =>  absint($no_of_main_banner),
    'post_type' => array( 'post' ) ,
    'category_name' => esc_attr($select_main_banner_category),
));
if(!is_paged()){
    if($disable_main_banner==0){
        if($select_main_banner_category!='' || $slider_options !='main-banner'){ ?>

            <div class="banner-list">
                <?php 
                if($slider_options == 'metaslider' || $slider_options == 'smartslider' || $slider_options == 'masterslider'){
                    do_action('trustnews_frontend_plugins_slider');
                } else {
                    while ($query->have_posts()):$query->the_post();  ?>
                        <div class="slide">
                            <div class="slide-content">
                                 <?php if(has_post_thumbnail()){ ?>
                                <div class="slide-thumb">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> <?php the_post_thumbnail('trustnews-main-banner'); ?></a>
                                    <?php } ?>
                                </div><!-- .slide-thumb -->

                                <div class="slide-text-wrap">
                                    <div class="slide-text-content">
                                        <div class="slide-meta">
                                            <?php 
                                                trustnews_cat_lists ();
                                                trustnews_posted_on(); 
                                            ?>
                                        </div><!-- .slide-meta -->
                                        <h2 class="slide-title"><a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                   
                                        <div class="slide-text">
                                            <?php 
                                                if($excerpt_display == 'full-content'){
                                                    the_content( sprintf(
                                                    wp_kses(
                                                        /* translators: %s: Name of current post. Only visible to screen readers */
                                                        $excerpt_text. '<span class="screen-reader-text"> "%s"</span>',
                                                        array(
                                                            'span' => array(
                                                                'class' => array(),
                                                            ),
                                                        )
                                                    ),
                                                    get_the_title()
                                                ) );
                                                } else {
                                                    the_excerpt();
                                                } ?>
                                        </div><!-- .slider-text -->
                                   
                                    </div><!-- .slide-text-content -->
                                </div><!-- .slide-text-wrap -->
                            </div><!-- .slide-content -->
                        </div><!-- .slide -->
                    <?php endwhile;
                    wp_reset_postdata();
                } ?>
            </div><!-- .banner-list -->
        <?php }
    }
} ?>

<?php }

add_action('trustnews_frontend_main_banner','trustnews_main_banner');

function trustnews_header_image(){ ?>
    <div class="custom-header">
        <div class="custom-header-media">
            <?php the_custom_header_markup(); ?>
        </div><!-- .custom-header-media -->
    </div><!-- .custom-header -->
<?php
}

add_action('trustnews_frontend_header_image','trustnews_header_image');


// Breaking News
function trustnews_breaking_news(){
$breaking_news_category = get_theme_mod('breaking_news_category','');
$breaking_news_title_text = get_theme_mod ('breaking_news_title_text',esc_html__('Breaking News','trustnews'));

if ($breaking_news_category ==''){
    $query = new WP_Query(array(
        'post_type' => array( 'post' )
    ));
} else {
    $query = new WP_Query(array(
        'post_type' => array( 'post' ) ,
        'category_name' => esc_attr($breaking_news_category),
    ));
}

?>
    <div class="breaking-news">
        <?php if ($breaking_news_title_text !=''){ ?>
        <div class="breaking-news-header">
            <h4 class="breaking-news-title"><?php echo esc_html($breaking_news_title_text); ?></h4>
        </div>
        <?php } ?>
        <div class="marquee">
            <?php while ($query->have_posts()):$query->the_post(); ?>
                <artical class="news-post-title">
                    <?php if (has_post_thumbnail()){ ?>
                        <span class="news-post-img">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
                         </span>
                     <?php } ?>

                    <h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
                </artical>

            <?php endwhile;
                wp_reset_postdata();
            ?>
        </div><!-- .marquee -->
    </div><!-- .breaking-news -->
    <?php
}

add_action('trustnews_frontend_breaking_news','trustnews_breaking_news');

// Before Main Banner
function trustnews_main_banner_before(){
$disable_main_banner = get_theme_mod('disable_main_banner',0);
$select_main_banner_category = get_theme_mod('select_main_banner_category','');
$upload_main_banner = get_theme_mod ('upload_main_banner','');
$slider_options = get_theme_mod('slider-options','main-banner');
    if($disable_main_banner==0){
        if($select_main_banner_category!='' || $slider_options !='main-banner'){ ?>
           <div class="main-banner" <?php if (!empty($upload_main_banner)){ ?> style="background-image: url('<?php echo esc_url ($upload_main_banner); ?>');"<?php } ?>>
                <div class="banner-wrap">

        <?php }
    }
}

add_action('trustnews_frontend_mainbanner_before','trustnews_main_banner_before');

// After Main Banner
function trustnews_main_banner_after(){
$disable_main_banner = get_theme_mod('disable_main_banner',0);
$select_main_banner_category = get_theme_mod('select_main_banner_category','');
$slider_options = get_theme_mod('slider-options','main-banner');
    if($disable_main_banner==0){
        if($select_main_banner_category!='' || $slider_options !='main-banner'){ ?>
            </div><!-- .banner-wrap -->
        </div><!-- .main-banner -->

        <?php }
    }
}

add_action('trustnews_frontend_mainbanner_after','trustnews_main_banner_after');

// Main Banner with hook
function trustnews_main_banner_after_hook(){
    $disable_main_banner = get_theme_mod('disable_main_banner',0); 
    if($disable_main_banner ==0 ) {

        /**
        * Main Banner
        */

        if (is_page_template( 'template/trustnews-template.php' )){
            do_action ('trustnews_frontend_mainbanner_before');
            //Static homepage
            do_action('trustnews_frontend_main_banner');
            do_action ('trustnews_frontend_mainbanner_after');
        }
        
    } 

}

add_action('trustnews_frontend_main_banner_after_hook','trustnews_main_banner_after_hook');