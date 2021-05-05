<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package trustnews
 */

//Excerpt More
function trustnews_excerpt_more( $link ) {
   $excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','trustnews'));
    if ( is_admin() ) {
        return $link;
    }

    $link = sprintf(
        '<a href="%1$s" class="more-link">%2$s</a>',
        esc_url( get_permalink( get_the_ID() ) ),
        /* translators: %s: Name of current post */
        sprintf( $excerpt_text, get_the_title( get_the_ID() ) )
    );
    return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'trustnews_excerpt_more' );

//Excerpt length
function trustnews_excerpt_length($length) {
    $excerpt_length = get_theme_mod('excerpt_length','30');
    if( is_admin() ){
        return absint($length);
    }

    $length = $excerpt_length;
    return absint($length);
}
add_filter('excerpt_length', 'trustnews_excerpt_length');

// Site Info
function trustnews_site_info(){ ?>
    <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'trustnews' ) ); ?>">
<?php
/* translators: %s: CMS name, i.e. WordPress. */
printf( esc_html__( 'Proudly powered by %s', 'trustnews' ), 'WordPress' );
?>
</a>
<span class="sep"> | </span>
<?php
/* translators: 1: Theme name, 2: Theme author. */
printf( esc_html__( 'Theme: %1$s By %2$s.', 'trustnews' ), __('TrustNews <span class="sep"> | </span> ','trustnews'),'<a href="'.esc_url('https://themespiral.com/') .'">' . esc_html__('ThemeSpiral.com','trustnews').'</a>' );
}

add_action ('trustnews_footer_copyright_frontend','trustnews_site_info');
