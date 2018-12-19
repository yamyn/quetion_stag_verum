<?php
/**
 * starthtmltemplate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package starthtmltemplate
 */

if ( ! function_exists( 'starthtmltemplate_com_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function starthtmltemplate_com_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on starthtmltemplate, use a find and replace
		 * to change 'starthtmltemplate-com' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'starthtmltemplate-com', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'starthtmltemplate-com' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'starthtmltemplate_com_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 40 ,
			'width'       => 40,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'starthtmltemplate_com_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function starthtmltemplate_com_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'starthtmltemplate_com_content_width', 640 );
}
add_action( 'after_setup_theme', 'starthtmltemplate_com_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function starthtmltemplate_com_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'starthtmltemplate-com' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'starthtmltemplate-com' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'starthtmltemplate_com_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function starthtmltemplate_com_scripts() {

	//Styles from html_site
	// wp_register_style( 'canonical', get_template_directory_uri() . ( '//verumtrade.com' ) );
	// wp_enqueue_style( 'canonical' );

	wp_register_style( 'shortcut icon', get_template_directory_uri() . ( '/images/favicons/favicon_verum.ico' ) );
	wp_enqueue_style( 'shortcut icon' );

	wp_register_style( 'icon', get_template_directory_uri() . ( '/images/favicons/favicon_verum.png' ) );
	wp_enqueue_style( 'icon' );

	wp_register_style( 'hamburger', get_template_directory_uri() . ( '/css/hamburgers.css' ) );
	wp_enqueue_style( 'hamburger' );

	wp_register_style( 'bootstrap', get_template_directory_uri() . ( '/css/bootstrap.min.css' ) );
	wp_enqueue_style( 'bootstrap' );

	wp_register_style( 'cloud-flare-css', get_template_directory_uri() . ( '//cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css' ) );
	wp_enqueue_style( 'cloud-flare-css' );

	wp_register_style( 'main-min', get_template_directory_uri() . ( '/css/main.min.css' ) );
	wp_enqueue_style( 'main-min' );

	//Scripts from html_site
	wp_register_script( 'jquery-3-3-1', get_template_directory_uri() . ( '//code.jquery.com/jquery-3.3.1.min.js' ) );
	wp_enqueue_script( 'jquery-3-3-1' );

	wp_register_script( 'cloud-flare-js', get_template_directory_uri() . ( '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' ) );
	wp_enqueue_script( 'cloud-flare-js' );

	wp_register_script( 'bootstrapcdn', get_template_directory_uri() . ( '//stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' ) );
	wp_enqueue_script( 'bootstrapcdn' );
	
	wp_register_script( 'tween-max', get_template_directory_uri() . ( '//tympanus.net/Development/ProximityFeedback/js/TweenMax.min.js' ) );
	wp_enqueue_script( 'tween-max' );

	wp_register_script( 'nearby', get_template_directory_uri() . ( '//tympanus.net/Development/ProximityFeedback/js/nearby.js' ) );
	wp_enqueue_script( 'nearby' );

	wp_register_script( 'charming', get_template_directory_uri() . ( '//tympanus.net/Development/ProximityFeedback/js/charming.min.js' ) );
	wp_enqueue_script( 'charming' );

	wp_register_script( 'feedback', get_template_directory_uri() . ( '/js/feedback-modal.js' ) );
	wp_enqueue_script( 'feedback' );

	wp_register_script( 'investor', get_template_directory_uri() . ( '/js/investor-modal.js' ) );
	wp_enqueue_script( 'investor' );

	wp_register_script( 'infinite-decoration', get_template_directory_uri() . ( 'js/infinite-decoration.js' ) );
	wp_enqueue_script( 'infinite-decoration' );

	wp_register_script( 'common', get_template_directory_uri() . ( '/js/common.js' ) );
	wp_enqueue_script( 'common' );

	//Defaults underscores style and scripts
	wp_enqueue_style( 'starthtmltemplate-com-style', get_stylesheet_uri() );

	wp_enqueue_script( 'starthtmltemplate-com-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'starthtmltemplate-com-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'starthtmltemplate_com_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
