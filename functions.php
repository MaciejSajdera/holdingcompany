<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! function_exists( '_s_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _s_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_s' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_s', get_template_directory() . '/assets/languages' );

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
				'main-menu-top' => esc_html__( 'Main Menu Top', '_s' ),
				'main-menu-bottom' => esc_html__( 'Main Menu Bottom', '_s' ),
				'investors-relationships-menu' => esc_html__( 'Investors Relationships Menu', '_s' ),
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
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'_s_custom_background_args',
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
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', '_s' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', '_s' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
	wp_enqueue_style( '_s-style', get_template_directory_uri() . '/dist/css/style.css', array(), '5.12');

	wp_enqueue_script( '_s-app', get_template_directory_uri() . '/dist/js/main.js', array(), '5.12', true);

	wp_enqueue_script( 'blogAnimations', get_template_directory_uri() . '/dist/js/blogAnimations.js', array(), '5.12', true );

	if (
		is_front_page() || is_page_template('home-template.php') ) {
		wp_enqueue_script( 'scrollAnimations', get_template_directory_uri() . '/dist/js/scrollAnimations.js', array(), '5.12', true );
	};

	// if (
	// 	is_blog() ) {
	// 		wp_enqueue_script( 'blogAnimations', get_template_directory_uri() . '/dist/js/blogAnimations.js', array(), '', true );
	// };

	if (
		is_page_template('career-page-template.php') ) {
		wp_enqueue_script( 'simple-ajax-post-pagination', get_template_directory_uri() . '/dist/js/simple-ajax-post-pagination.js', array(), '5.06', true );
	};

	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	};
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

function is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}


function wpb_add_google_fonts() {
	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=Monda&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

function change_logo_on_single($html) {

	$single_post_logo = get_field('blog_post_logo', 2);

   if(is_single()){
      $html = preg_replace('/<img(.*?)\/>/', '<img src="' .$single_post_logo. '" class="custom-logo" alt="" itemprop="logo" />', $html);
   }

   return $html;
}

add_filter('get_custom_logo','change_logo_on_single');

function my_login_logo_one() { 
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
?> 
<style type="text/css"> 
body.login div#login h1 a {
	background-image: url(<?php echo $image[0]; ?>);
	width: 100%;
	height: 100%;
	max-width: 150px;
	background-size: contain;
	padding-bottom: 30px; 
} 
</style>
	<?php 
}
add_action( 'login_enqueue_scripts', 'my_login_logo_one' );

add_filter('get_the_archive_title_prefix','__return_false');

function trim_title($limit, $words){
	$source = $words;
    $source = preg_replace(" (\[.*?\])",'',$source);
    $source = strip_shortcodes($source);
    $source = strip_tags($source);
    $source = substr($source, 0, $limit);
    $source = substr($excerpt, 0, strripos($source, " "));
    $source = trim(preg_replace( '/\s+/', ' ', $source));
    $source = $source.'...';
    return $source;
}

function my_custom_query( $posts_per_page = 4) {
	$args = array(
	  'posts_per_page' => $posts_per_page,
	  'post_status' => 'publish',
	  // other args here
	); 
	return new WP_Query( $args );
}

function wpcodex_add_excerpt_support_for_pages() {
	add_post_type_support( 'job_offers', 'excerpt' );
}
add_action( 'init', 'wpcodex_add_excerpt_support_for_pages' );

function my_load_more_scripts() {
 
	$your_query = my_custom_query();
 
	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');
 
	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/dist/js/myloadmore.js', array('jquery') );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'my_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $your_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $your_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'my_loadmore' );
}

add_action( 'wp_enqueue_scripts', 'my_load_more_scripts' );

function my_loadmore_ajax_handler(){

	// prepare our arguments for the query
	$args = json_decode( stripslashes( $_POST['query'] ), true );
	$args['offset'] = 4;
	$args['posts_per_page'] = 2;
	
 
	query_posts( $args );

	// $query = my_custom_query(6);
	   
	while ( have_posts() ) { the_post();
	 // your loop code here
	 echo '
	 <a class="blog-post" href="'. get_permalink() .'">
		 <div class="blog-post__upper" style="background-image: url(' .get_the_post_thumbnail_url(). ')"></div>
		 <div class="blog-post__caption">
			 <div>
			 <span class="blog-post__date sub-text--grey">'. get_the_date() .'</span>
			 <h3 class="uppercase">' . mb_strimwidth( html_entity_decode(get_the_title()), 0, 70, '...' ) . '</h3>
			 </div>
			 <p class="sub-text--grey read-more ">Dowiedz się więcej <span class="arrow-right"></span></p>
		 </div>
	 </a>
	 ';
   }
   die();
}


add_action('wp_ajax_loadmore', 'my_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'my_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}


/* BREADCRUMBS FILTER */

// add_filter( 'wpseo_breadcrumb_output', 'filter_wpseo_breadcrumb_output', 10, 1 );

// function filter_wpseo_breadcrumb_output( $output ) {
// 	var_dump($output);
// }

// Move Yoast to bottom
function yoasttobottom() {
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');

///////////////////////// MENUS ////////////////////////////

add_filter( 'wp_nav_menu_objects', 'wpdocs_add_menu_parent_class', 11, 3 );

function wpdocs_add_menu_parent_class( $items ) {
    $parents = array();

    // Collect menu items with parents.
    foreach ( $items as $item ) {
        if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
            $parents[] = $item->menu_item_parent;
        }
    }

    // Add class.
    foreach ( $items as $item ) {
        if ( in_array( $item->ID, $parents ) ) {
            $item->classes[] = 'menu-parent-link'; //here attach the class
			// $item->title .= ' <span class="expand-menu-toggle"></span>';
        }
    }

    return $items;
}

function prefix_add_button_after_menu_item_children( $item_output, $item, $depth, $args ) {

        if ( in_array( 'menu-item-has-children', $item->classes ) || in_array( 'page_item_has_children', $item->classes ) ) {
            $item_output = str_replace( $args->link_after . '</a>', $args->link_after . '</a><span class="show-submenu" aria-expanded="false" aria-pressed="false"></span>', $item_output );
        }

    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_add_button_after_menu_item_children', 10, 4 );


class Has_Child_Walker_Nav_Menu extends Walker_Nav_Menu {
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element ) {
            return;
        }
        $element->has_children = ! empty( $children_elements[ $element->{$this->db_fields['id']} ] );
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}


// add_action( 'transition_post_status', 'send_mails_on_publish', 10, 3 );

// function send_mails_on_publish( $new_status, $old_status, $post )
// {
//     if ( 'publish' !== $new_status or 'publish' === $old_status
//         or 'my_custom_type' !== get_post_type( $post ) )
//         return;

//     $subscribers = get_users( array ( 'role' => 'subscriber' ) );
//     $emails      = array ();

//     foreach ( $subscribers as $subscriber )
//         $emails[] = $subscriber->user_email;

//     $body = sprintf( 'Hey there is a new entry!
//         See <%s>',
//         get_permalink( $post )
//     );


//     wp_mail( $emails, 'New entry!', $body );
// }


//for security reasons
add_filter('xmlrpc_enabled', '__return_false');

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
 * Generating dynamic sytles.
 */
require get_template_directory() . '/inc/dynamic-styles.php';
