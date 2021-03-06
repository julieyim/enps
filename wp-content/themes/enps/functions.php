<?php
/**
 * ENPS functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ENPS
 * @version 1.0.0
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'enps_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function enps_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on ENPS, use a find and replace
		 * to change 'enps' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'enps', get_template_directory() . '/languages' );

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
		register_nav_menus(
			array(
				'main-nav' => esc_html__( 'Primary', 'enps' ),
				'sub-nav' => 'Sub Menu',
				'footer-nav' => 'Footer Menu',
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'enps_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'enps_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function enps_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'enps_content_width', 640 );
}
add_action( 'after_setup_theme', 'enps_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function enps_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'enps' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'enps' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'enps_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function enps_scripts() {
	wp_enqueue_style( 'enps-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'enps-style', 'rtl', 'replace' );

	//enqueue scripts:
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'),1.1, true); 

}
add_action( 'wp_enqueue_scripts', 'enps_scripts' );

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

// with this area you can register a number of files/objects
$dc_includes = array(
	'/widgets.php',                         // Register widget area.
);

foreach ( $dc_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}


//Register Projects Custom Post type
function create_post_type_projects(){
	// creates label names for the post type in the dashboard the post panel and in the toolbar.
	$labels = array(
		'name'                  => __('Projects'),
		'singular_name'         => __('Project'), 
		'add_new'               => 'New Project', 
		'add_new_item'          => 'Add New Project',
		'edit_item'             => 'Edit Projects',
		'featured_image'        => _x( 'Volunteer Post Image', 'Overrides the ???Featured Image??? phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the ???Set featured image??? phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the ???Remove featured image??? phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the ???Use as featured image??? phrase for this post type. Added in 4.3', 'textdomain' ),

	);
	// creates the post functionality that you want for a full listing
	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'has_archive'       => true,
		'rewrite'           => array('slug' => 'projects'),
		'menu_position'     => 20,
		'menu_icon'         => 'dashicons-location-alt',
		'capability_type'   => 'page',
		'taxonomies'        => array('category', 'post_tag'),
		'supports'          => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields')
	);

	register_post_type('projects', $args);
}
// Hooking up our function to theme setup
add_action('init', 'create_post_type_projects');



//Register Notices Custom Post type
function create_post_type_notices(){
	// creates label names for the post type in the dashboard the post panel and in the toolbar.
	$labels = array(
		'name'                  => __('Notices'),
		'singular_name'         => __('Notice'), 
		'add_new'               => 'New Notice', 
		'add_new_item'          => 'Add New Notice',
		'edit_item'             => 'Edit Notice',
		'featured_image'        => _x( 'Notice Post Image', 'Overrides the ???Featured Image??? phrase for this post type. Added in 4.3', 'textdomain' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the ???Set featured image??? phrase for this post type. Added in 4.3', 'textdomain' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the ???Remove featured image??? phrase for this post type. Added in 4.3', 'textdomain' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the ???Use as featured image??? phrase for this post type. Added in 4.3', 'textdomain' ),

	);
	// creates the post functionality that you want for a full listing
	$args = array(
		'labels'            => $labels,
		'public'            => true,
		'has_archive'       => true,
		'rewrite'           => array('slug' => 'notices'),
		'menu_position'     => 20,
		'menu_icon'         => 'dashicons-megaphone',
		'capability_type'   => 'page',
		'taxonomies'        => array('category', 'post_tag'),
		'supports'          => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields')
	);

	register_post_type('notices', $args);
}
// Hooking up our function to theme setup
add_action('init', 'create_post_type_notices');



// Hooking up our function to theme setup
add_action('init', 'create_post_type_events');

function my_excerpt_length($length){
	return 26;
}
add_filter('excerpt_length', 'my_excerpt_length');



/* page pagination */
function page_pagination(){
	global $wp_query;

	$total_pages = $wp_query->max_num_pages;

	if($total_pages > 1){
		$current_page = max(1, get_query_var('paged'));
		echo paginate_links(array(
			'base' => get_pagenum_link(1) . '%_%',
			'format' => '/page/%#%',
			'current' => $current_page,
			'total' => $total_pages,
			'prev_text' => 'Prev',
			'next_text' => 'Next',
		));
	}
}



/* post pagination (single posts) */
function post_pagination() {
	global $wp_query;
	?>

	<nav class="pagination" role="navigation">
		<ul>
			<li class="prev-post"><?php previous_post_link( '%link', '&larr; Previous Notice' ); ?></li>
			<li class="next-post"><?php next_post_link( '%link', 'Next Notice &rarr;' ); ?></li>
		</ul>
	</nav>

	<?php
}



/* cpt pagination */
  /**
    * Display navigation to next/previous set of posts when applicable.
    */

    function cpt_pagination($max_num_pages = 0) {
		// Don't print empty markup if there's only one page.
		
		if ( $GLOBALS['wp_query']->max_num_pages < 2 && $max_num_pages < 2 ) {
			return;
		}
	
		// Setting up default values based on the current URL
		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );
	
		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}
	
		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
	
		// URL base depends on permalink settings.
		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
		
		// Set up paginated links.
		$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $max_num_pages !== 0 ? $max_num_pages : $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 2,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => '&larr; Previous',
			'next_text' => 'Next &rarr;',
		) );
	
		if ( $links ) :
	
		?>
		<nav class="navigation paging-navigation" role="navigation">
			<div class="pagination loop-pagination">
				<?php echo $links; ?>
			</div><!-- .pagination -->
		</nav><!-- .navigation -->

	<?php endif;
}


/* the events gallery allow shortcodes */
add_filter( 'tribe_customizer_should_print_shortcode_customizer_styles', '__return_true' );