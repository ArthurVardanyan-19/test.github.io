/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

 ( function( $ ) {

 	wp.customize( 'primary_theme_color', function( value ) {
 		value.bind( function( to ) {
 			$( '.total-comments span:after, span.sticky-post, .nav-previous a:hover, .nav-next a:hover, #commentform input#submit, .home_menu_item, .currenttext, .pagination a:hover, .pagination .current, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce-product-search input[type="submit"], .woocommerce a.button, .woocommerce-page a.button, .woocommerce button.button, .woocommerce-page button.button, .woocommerce input.button, .woocommerce-page input.button, .woocommerce #respond input#submit, .woocommerce-page #respond input#submit, .woocommerce #content input.button, .woocommerce-page #content input.button, #sidebars h3.widget-title:after, .postauthor h4:after, .related-posts h3:after, .archive .postsby span:after, .comment-respond h4:after, .single_post header:after, #cancel-comment-reply-link, .upper-widgets-grid h3:after' ).css( {
 				'background':to
 			});
 		} );
 	} );

 	wp.customize( 'primary_theme_color', function( value ) {
 		value.bind( function( to ) {
 			$( '#sidebars .widget h3, #sidebars .widget h3 a' ).css( {
 				'border-left-color':to
 			});
 		} );
 	} );

 	wp.customize( 'primary_theme_color', function( value ) {
 		value.bind( function( to ) {
 			$( 'a.readmore-button, a.readmore-button:hover' ).css( {
 				'background':to
 			});
 		} );
 	} );


 	wp.customize( 'primary_theme_color', function( value ) {
 		value.bind( function( to ) {
 			$( '.related-posts-no-img, #navigation ul li.current-menu-item a, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce-page nav.woocommerce-pagination ul li span.current, .woocommerce #content nav.woocommerce-pagination ul li span.current, .woocommerce-page #content nav.woocommerce-pagination ul li span.current, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce-page nav.woocommerce-pagination ul li a:hover, .woocommerce #content nav.woocommerce-pagination ul li a:hover, .woocommerce-page #content nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce-page nav.woocommerce-pagination ul li a:focus, .woocommerce #content nav.woocommerce-pagination ul li a:focus, .woocommerce-page #content nav.woocommerce-pagination ul li a:focus, .pagination .current, .tagcloud a' ).css( {
 				'border-color':to
 			});
 		} );
 	} );


 	wp.customize( 'header_text_color', function( value ) {
 		value.bind( function( to ) {
 			$( '.site-branding .site-title, .site-branding .site-description, .site-title' ).css( {
 				'color':to
 			});
 		} );
 	} );

 	wp.customize( 'top_header_background_color', function( value ) {
 		value.bind( function( to ) {
 			$( '#site-header' ).css( {
 				'background-color':to
 			});
 		} );
 	} );

 	wp.customize( 'sidebar_headline_color', function( value ) {
 		value.bind( function( to ) {
 			$( '#sidebars .widget h3, #sidebars .widget h3 a, #sidebars h3' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'sidebar_link_color', function( value ) {
 		value.bind( function( to ) {
 			$( '#sidebars .widget a, #sidebars a, #sidebars li a' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'sidebar_text_color', function( value ) {
 		value.bind( function( to ) {
 			$( '#sidebars .widget, #sidebars, #sidebars .widget li' ).css( {
 				'color':to
 			});
 		} );
 	} );

 	wp.customize( 'post_page_background', function( value ) {
 		value.bind( function( to ) {
 			$( '#content, #comments, #commentsAdd, .related-posts, .single-post .post.excerpt, .postauthor' ).css( {
 				'background':to
 			});
 		} );
 	} );



 	wp.customize( 'sidebar_background_color', function( value ) {
 		value.bind( function( to ) {
 			$( '#sidebars .widget' ).css( {
 				'background':to
 			});
 		} );
 	} );

 	wp.customize( 'all_blog_posts_text', function( value ) {
 		value.bind( function( to ) {
 			$( '.post.excerpt .post-content, .pagination a, .pagination2, .pagination .dots' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'all_blog_posts_headline', function( value ) {
 		value.bind( function( to ) {
 			$( '.post.excerpt h2.title a' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'all_blog_posts_text', function( value ) {
 		value.bind( function( to ) {
 			$( '.pagination a, .pagination2, .pagination .dots' ).css( {
 				'border-color':to
 			});
 		} );
 	} );
 	wp.customize( 'all_blog_posts_date', function( value ) {
 		value.bind( function( to ) {
 			$( 'span.entry-meta' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'post_page_headline', function( value ) {
 		value.bind( function( to ) {
 			$( '.article h1, .article h2, .article h3, .article h4, .article h5, .article h6, .total-comments, .article th' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'post_page_text', function( value ) {
 		value.bind( function( to ) {
 			$( '.article, .article p, .related-posts .title, .breadcrumb, .article #commentform textarea' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'post_page_link', function( value ) {
 		value.bind( function( to ) {
 			$( '.article a, .breadcrumb a, #commentform a' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'post_page_link', function( value ) {
 		value.bind( function( to ) {
 			$( '#commentform input#submit, #commentform input#submit:hover' ).css( {
 				'background':to
 			});
 		} );
 	} );
 	wp.customize( 'post_page_date', function( value ) {
 		value.bind( function( to ) {
 			$( '.post-date-customizable, .comment time' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'footer_link_color', function( value ) {
 		value.bind( function( to ) {
 			$( '.footer-widgets #searchform input[type="submit"], .footer-widgets #searchform input[type="submit"]:hover' ).css( {
 				'background':to
 			});
 		} );
 	} );
 	wp.customize( 'footer_headline_color', function( value ) {
 		value.bind( function( to ) {
 			$( '.footer-widgets h3:after' ).css( {
 				'background':to
 			});
 		} );
 	} );
 	wp.customize( 'footer_headline_color', function( value ) {
 		value.bind( function( to ) {
 			$( '.footer-widgets h3' ).css( {
 				'color':to
 			});
 		} );
 	} );



 	wp.customize( 'all_blog_posts_bg', function( value ) {
 		value.bind( function( to ) {
 			$( '.pagination a, .pagination2, .pagination .dots, .post.excerpt' ).css( {
 				'background':to
 			});
 		} );
 	} );

 	wp.customize( 'footer_text_color', function( value ) {
 		value.bind( function( to ) {
 			$( '.footer-widgets .widget li, .footer-widgets .widget, #copyright-note, footer p' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'footer_link_color', function( value ) {
 		value.bind( function( to ) {
 			$( 'footer .widget a, #copyright-note a, #copyright-note a:hover, footer .widget a:hover, footer .widget li a:hover' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'upper_widgets_link_color', function( value ) {
 		value.bind( function( to ) {
 			$( '.top-column-widget a, .top-column-widget a:hover, .top-column-widget a:active, .top-column-widget a:focus' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'upper_widgets_content_color', function( value ) {
 		value.bind( function( to ) {
 			$( '.top-column-widget, .upper-widgets-grid' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'upper_widgets_headlinke_color', function( value ) {
 		value.bind( function( to ) {
 			$( '.top-column-widget .widget.widget_rss h3 a, .upper-widgets-grid h3, .top-column-widget h3' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'navigation_frontpage_link_color', function( value ) {
 		value.bind( function( to ) {
 			$( '.primary-navigation.header-activated #navigation a' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'navigation_background_color', function( value ) {
 		value.bind( function( to ) {
 			$( '#navigation.mobile-menu-wrapper' ).css( {
 				'background-color':to
 			});
 		} );
 	} );
 	wp.customize( 'navigation_background_color', function( value ) {
 		value.bind( function( to ) {
 			$( '.primary-navigation, .primary-navigation, #navigation ul ul li' ).css( {
 				'background-color':to
 			});
 		} );
 	} );
 	wp.customize( 'navigation_link_color', function( value ) {
 		value.bind( function( to ) {
 			$( 'a#pull, #navigation .menu a, #navigation .menu a:hover, #navigation .menu .fa > a, #navigation .menu .fa > a, #navigation .toggle-caret, #navigation span.site-logo a, #navigation.mobile-menu-wrapper .site-logo a, .primary-navigation.header-activated #navigation ul ul li a' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'footer_bg_color', function( value ) {
 		value.bind( function( to ) {
 			$( 'footer' ).css( {
 				'background-color':to
 			});
 		} );
 	} );
 	wp.customize( 'footer_copyright_bg_color', function( value ) {
 		value.bind( function( to ) {
 			$( '.copyrights' ).css( {
 				'background-color':to
 			});
 		} );
 	} );
 	wp.customize( 'upper_widgets_background_color', function( value ) {
 		value.bind( function( to ) {
 			$( '.upper-widgets-grid' ).css( {
 				'background-color':to
 			});
 		} );
 	} );
 	wp.customize( 'header_right_button_text_color', function( value ) {
 		value.bind( function( to ) {
 			$( '.header-button-solid, .header-button-solid:hover, .header-button-solid:active, .header-button-solid:focus' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'header_right_button_bg', function( value ) {
 		value.bind( function( to ) {
 			$( '.header-button-solid, .header-button-solid:hover, .header-button-solid:active, .header-button-solid:focus' ).css( {
 				'background':to
 			});
 		} );
 	} );
 	wp.customize( 'header_left_button_text_color', function( value ) {
 		value.bind( function( to ) {
 			$( '.header-button-border, .header-button-border:hover, .header-button-border:active, .header-button-border:focus' ).css( {
 				'color':to
 			});
 		} );
 	} );
 	wp.customize( 'header_left_button_bg', function( value ) {
 		value.bind( function( to ) {
 			$( '.header-button-border, .header-button-border:hover, .header-button-border:active, .header-button-border:focus' ).css( {
 				'border-color':to
 			});
 		} );
 	} );



	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-branding .site-title, .site-branding .site-description, .site-title' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-branding .site-title, .site-branding .site-description, .site-title' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-branding .site-title, .site-branding .site-description, .site-title' ).css( {
					'color': to
				} );
			}
		} );
	} );
} )( jQuery );
