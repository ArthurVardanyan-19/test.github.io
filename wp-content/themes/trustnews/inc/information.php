<?php
/**
 * Information about theme
 *
 * @link https://jetpack.com/
 *
 * @package trustnews
 */

/*
** Notice after Theme Activation and Update.
*/
function trustnews_activation_notice() {
  global $current_user;
    $current_user_id   = $current_user->ID;
  $theme_data  = wp_get_theme();
  if ( !get_user_meta( $current_user_id, esc_html( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore' ) ) {

    echo '<div class="notice trustnews-dismiss">';
    
      echo '<h1>';
        /* translators: %s theme name */
        printf( esc_html__( 'Welcome to %s', 'trustnews' ), esc_html( $theme_data->Name ) );
      echo '</h1>';
      echo '<p>';
        printf( __( 'Thank you for choosing %1$s! To fully take advantage of our best theme, make sure you visit Welcome page', 'trustnews' ), esc_html( $theme_data->Name ), esc_url( admin_url( 'themes.php?page=trustnews-about' ) ) );
        printf( '<a href="%1$s" class="notice-dismiss dashicons dashicons-dismiss dashicons-dismiss-icon"></a>', '?' . esc_html( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore=0' );
      echo '</p>';
      echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=trustnews-about' ) ) .'" class="button button-primary">';
        printf( esc_html__( 'Get started with %s', 'trustnews' ), esc_html( $theme_data->Name ) );
      echo '</a></p>';

    echo '</div>';
  }
}