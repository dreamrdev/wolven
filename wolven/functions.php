<?php
/**
 * Wolven functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wolven
 */
add_action('wp_head', 'save_customize_options');
function save_customize_options(){
	?>
    <style type="text/css">
        body{
            background-color:<?php echo get_theme_mod('custom-background') ?> !important;
        }
        <?php if(get_theme_mod('custom-header-image')) :?>
        #masthead{
            background-image: url("<?php echo get_theme_mod('custom-header-image')?>") !important;
        }
        <?php else : ?>
        #masthead{
            background-image: none !important;
            height: auto !important;
            background-color:<?php echo get_theme_mod('header-noimage-bg-color') ?> !important;
            padding-bottom: 80px;
        }
        <?php endif; ?>

        <?php if(!get_theme_mod('custom-header-image') && !get_theme_mod('cta-button-text') && !has_custom_logo()) :?>
        #sitelogo-container{
            display: none;
        }
        #masthead{
            padding-bottom: 0px;
        }
        <?php else : ?>

        <?php endif; ?>

        .navbar a{
            color: <?php echo get_theme_mod('header-link-color') ?> !important;
        }
        .navbar a:hover{
            color: <?php echo get_theme_mod('header-link-hover-color') ?> !important;
        }
        #post-page .post-title a{
            color: <?php echo get_theme_mod('post-title-color') ?> !important;
        }
        #post-page .post-excerpt{
            color: <?php echo get_theme_mod('post-excerpt-color') ?> !important;
        }
        #footer-widgets-area{
            background-color:<?php echo get_theme_mod('footer-widget-area-background-color') ?> !important;
        }
        #footer-widgets-area a{
            color: <?php echo get_theme_mod('footer-widget-area-link-color') ?> !important;
        }
        #footer-widgets-area a:hover{
            color: <?php echo get_theme_mod('footer-widget-area-link-hover-color') ?> !important;
        }
        #footer-widgets-area .widget-title{
            color: <?php echo get_theme_mod('footer-widget-area-title-color') ?> !important;
        }
        .site-logo #cta-btn{
            background: transparent;
            color: <?php echo get_theme_mod('cta-button-text-color') ?> !important;
            padding: 10px 40px;
            border: 2px solid <?php echo get_theme_mod('cta-button-border-color') ?> !important;;
            border-radius: 5px;
        }
        .site-logo #cta-btn:hover{
            color: <?php echo get_theme_mod('cta-button-text-color') ?> !important;
        }
        .site-logo h5{
            color: <?php echo get_theme_mod('site-desc-text-color') ?> !important;
        }
    </style>
	<?php
}

if ( ! function_exists( 'wolven_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function wolven_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Wolven, use a find and replace
		 * to change 'wolven' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'wolven', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'wolven' ),
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
		add_theme_support( 'custom-background', apply_filters( 'wolven_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'wolven_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wolven_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'wolven_content_width', 640 );
}
add_action( 'after_setup_theme', 'wolven_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wolven_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wolven' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wolven' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'wolven_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wolven_scripts() {
	wp_enqueue_style( 'wolven-style', get_stylesheet_uri() );

	wp_enqueue_script( 'wolven-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wolven-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wolven_scripts' );

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

function wolven_footer_widgets_init() {

	// First footer widget area, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'wolven' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'wolven' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

	// Second Footer Widget Area, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'wolven' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'wolven' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

	// Third Footer Widget Area, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'wolven' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'wolven' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

	// Fourth Footer Widget Area, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'wolven' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'wolven' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );

}


// Register sidebars by running tutsplus_widgets_init() on the widgets_init hook.
add_action( 'widgets_init', 'wolven_footer_widgets_init' );

function pagination_bar() {
	global $wp_query;

	$total_pages = $wp_query->max_num_pages;

	if ($total_pages > 1){
		$current_page = max(1, get_query_var('paged'));

		echo paginate_links(array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => '/page/%#%#content',
			'current' => $current_page,
			'total' => $total_pages,
		));
	}
}

