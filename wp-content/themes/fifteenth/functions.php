<?php
/**
 * Fifteenth functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package  Fifteenth
 * @since Fifteenth 1.0
 */

/**
 * Fifteenth only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'fifteenth_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Fifteenth 1.0
 */
function fifteenth_setup() {

	/**
     * Set the content width based on the theme's design and stylesheet.
     *
     * @since Fifteenth 1.0
     */
    global $content_width;
	if ( ! isset( $content_width ) ) {
	    $content_width = 660;
    }
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on fifteenth, use a find and replace
	 * to change 'fifteenth' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'fifteenth', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'fifteenth' ),
		'social'  => __( 'Social Links Menu', 'fifteenth' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	$color_scheme  = fifteenth_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'fifteenth_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', fifteenth_fonts_url() ) );
}
endif; // fifteenth_setup
add_action( 'after_setup_theme', 'fifteenth_setup' );

/**
 * Register widget area.
 *
 * @since Fifteenth 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function fifteenth_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'fifteenth' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'fifteenth' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'fifteenth_widgets_init' );

if ( ! function_exists( 'fifteenth_fonts_url' ) ) :
/**
 * Register Google fonts for Fifteenth.
 *
 * @since Fifteenth 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function fifteenth_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Noto Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'fifteenth' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/* translators: If there are characters in your language that are not supported by Noto Serif, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'fifteenth' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'fifteenth' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'fifteenth' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = esc_url(add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		),  '//fonts.googleapis.com/css' ));
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function fifteenth_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'fifteenth_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Fifteenth 1.0
 */
function fifteenth_scripts() {
	$fifteenth_theme = wp_get_theme();
    $version = $fifteenth_theme->get( 'Version' );
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'fifteenth-fonts', fifteenth_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), $version );

	// Load our main stylesheet.
	
	if ( is_child_theme() )
		wp_enqueue_style( 'fifteenth-style', trailingslashit( get_template_directory_uri() ) . 'style.css', $version );

	wp_enqueue_style( 'fifteenth-child', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'fifteenth-ie', get_template_directory_uri() . '/css/ie.css', array( 'fifteenth-style' ), $version );
	wp_style_add_data( 'fifteenth-ie', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'fifteenth-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'fifteenth-style' ), $version );
	wp_style_add_data( 'fifteenth-ie7', 'conditional', 'lt IE 8' );

	wp_enqueue_script( 'fifteenth-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), $version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'fifteenth-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), $version );
	}

	wp_enqueue_script( 'fifteenth-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), $version, true );
	wp_localize_script( 'fifteenth-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'fifteenth' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'fifteenth' ) . '</span>',
	) );
	
	wp_enqueue_script( 'fifteenth-html5shiv', get_template_directory_uri() . '/js/html5.js', array(), $version, false );
}
add_action( 'wp_enqueue_scripts', 'fifteenth_scripts' );

/** 
 * Enclose html5shiv in a IE conditional 
 * 
 * @since Fifteenth 1.0.0 
 */ 
function fifteenth_html5shiv( $tag, $handle, $src ) { 
    if ( 'fifteenth-html5shiv' === $handle ) { 
        $tag = "<!--[if lt IE 9]>\n"; 
        $tag .= "<script type='text/javascript' src='$src'></script>\n"; 
        $tag .= "<![endif]-->\n"; 
 	} 
    return $tag; 
} 
add_filter( 'script_loader_tag', 'fifteenth_html5shiv', 10, 3 );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Fifteenth 1.0.0
 *
 * @see wp_add_inline_style()
 */
function fifteenth_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'fifteenth-style', $css );
}
add_action( 'wp_enqueue_scripts', 'fifteenth_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Fifteenth 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function fifteenth_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'fifteenth_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Fifteenth 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function fifteenth_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'fifteenth_search_form_modify' );

/**
 * Implement the Custom Header feature.
 *
 * @since Fifteenth 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Fifteenth 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Fifteenth 1.0
 */
require get_template_directory() . '/inc/customizer.php';

// Lets generate a dynamic date for our footer Copyright
function fifteenth_copyright() {
global $wpdb;
    $copyright_dates = $wpdb->get_results("
        SELECT
        YEAR(min(post_date_gmt)) AS firstdate,
        YEAR(max(post_date_gmt)) AS lastdate
        FROM
        $wpdb->posts
        WHERE
        post_status = 'publish'
    ");
    $output = '';
    if($copyright_dates) {
        $copyright = "&copy; " . $copyright_dates[0]->firstdate;
    if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
        $copyright .= ' - ' . $copyright_dates[0]->lastdate;
    }
    $output = $copyright;
    }
return $output;
}

/**
 * Lets put the Footer credits together ready for output.
 */
function fifteenth_display_credits() {
    $theme_name = wp_get_theme();
	$theme_dev = $theme_name->get( 'Author' );
	$dev_url = $theme_name->get( 'AuthorURI' );
	$power_url = ( 'https://wordpress.org/' );
	$text = __('Copyright ', 'fifteenth' ) . fifteenth_copyright() . '<span class="sep"> | </span>';
	$text .= sprintf( __( 'Proudly powered by %s', 'fifteenth' ), '<a href="' . esc_url($power_url) . '" rel="generator" target="_blank">WordPress</a>' );
	$text .= '<span class="sep"> | </span>';
	$text .= sprintf( __( 'Theme: %1$s by %2$s', 'fifteenth' ), $theme_name, '<a href="' . esc_url($dev_url) . '" rel="designer" target="_blank">' . $theme_dev .'</a>' );
	echo apply_filters( 'fifteenth_credits_text', $text );
}
add_action( 'fifteenth_credits', 'fifteenth_display_credits' );
