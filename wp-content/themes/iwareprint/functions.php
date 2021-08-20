<?php

if(!defined('PVP_THEME_DIR')) {
	define('PVP_THEME_DIR', get_theme_root().'/'.get_template().'/');
}

if(!defined('PVP_THEME_URL')) {
	define('PVP_THEME_URL', WP_CONTENT_URL.'/themes/'.get_template().'/');
}

// Include custom navwalker
require_once('bs4navwalker.php');

// Register WordPress nav menu
register_nav_menu('top', 'Top menu');

// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );

// Search
add_theme_support('html5',array('search-form'));

// Limit words in excerpt
function custom_excerpt_length( $length ) {
	return 18;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'Home right sidebar',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );

// Ajax
function enqueue_ajax_load_more() {
   wp_enqueue_script('ajax-load-more'); // Already registered, just needs to be enqueued
}
add_action( 'wp_enqueue_scripts', 'enqueue_ajax_load_more' );

flush_rewrite_rules( false );




function helpdesk_taxonomy() {
    register_taxonomy( 'kategorie',
        array(
            'helpdesk',
            'implementation_list',
            'e_commerce_module',
            'trader',
            'wizard',
            'production',
            'reseller',
            'preflight',
            'podzlecanie'
        ),
        array(
            'rewrite'      => [
                'slug'       => false,
                'with_front'   => false,
                'hierarchical' => true,
            ],
            'hierarchical' => true,
            'has-archive' => true,
            'publicly_queryable'    => true,
            'labels'       => [
                'name' => 'Kategorie',
                'singular_name' => 'Kategoria',
            ],
            'show_in_rest' => true
        )
    );
}

function helpdesk_post_type() {
    register_post_type( 'helpdesk', [
            'rewrite'      => [
                'with_front' => false,
				'has-archive' => false,
				'slug'       => 'baza-wiedzy',
            ],
			 'has-archive' => false,
            'hierarchical' => true,
            'public'       => true,
            'supports'     => [ 'title', 'editor', 'page-attributes' ],
            'labels'       => [
                'name' => 'Helpdesk',
			'singular_name' => 'Help',
            ],
            'show_in_rest' => true,
        ]
    );
    register_post_type('implementation_list', [
        'rewrite'      => [
            'with_front' => false,
            'has-archive' => false,
            'slug'       => 'baza-wiedzy/lw',
        ],
        'has-archive' => false,
        'hierarchical' => true,
        'public'       => true,
        'supports'     => [ 'title', 'editor', 'page-attributes' ],
        'labels'       => [
            'name' => 'LW',
            'singular_name' => 'LW',
        ],
        'show_in_rest' => true,
    ]);
    register_post_type('e_commerce_module', [
        'rewrite'      => [
            'with_front' => false,
            'has-archive' => false,
            'slug'       => 'baza-wiedzy/e-commerce',
        ],
        'has-archive' => false,
        'hierarchical' => true,
        'public'       => true,
        'supports'     => [ 'title', 'editor', 'page-attributes' ],
        'labels'       => [
            'name' => 'E-Commerce',
            'singular_name' => 'E-Commerce',
        ],
        'show_in_rest' => true,
    ]);
    register_post_type('trader', [
        'rewrite'      => [
            'with_front' => false,
            'has-archive' => false,
            'slug'       => 'baza-wiedzy/handlowiec',
        ],
        'has-archive' => false,
        'hierarchical' => true,
        'public'       => true,
        'supports'     => [ 'title', 'editor', 'page-attributes' ],
        'labels'       => [
            'name' => 'Handlowiec',
            'singular_name' => 'Handlowiec',
        ],
        'show_in_rest' => true,
    ]);
    register_post_type('wizard', [
        'rewrite'      => [
            'with_front' => false,
            'has-archive' => false,
            'slug'       => 'baza-wiedzy/kreator-wydrukow',
        ],
        'has-archive' => false,
        'hierarchical' => true,
        'public'       => true,
        'supports'     => [ 'title', 'editor', 'page-attributes' ],
        'labels'       => [
            'name' => 'Kreator',
            'singular_name' => 'Kreator',
        ],
        'show_in_rest' => true,
    ]);
    register_post_type('production', [
        'rewrite'      => [
            'with_front' => false,
            'has-archive' => false,
            'slug'       => 'baza-wiedzy/produkcja',
        ],
        'has-archive' => false,
        'hierarchical' => true,
        'public'       => true,
        'supports'     => [ 'title', 'editor', 'page-attributes' ],
        'labels'       => [
            'name' => 'Produkcja',
            'singular_name' => 'Produkcja',
        ],
        'show_in_rest' => true,
    ]);
    register_post_type('reseller', [
        'rewrite'      => [
            'with_front' => false,
            'has-archive' => false,
            'slug'       => 'baza-wiedzy/reseller',
        ],
        'has-archive' => false,
        'hierarchical' => true,
        'public'       => true,
        'supports'     => [ 'title', 'editor', 'page-attributes' ],
        'labels'       => [
            'name' => 'Reseller',
            'singular_name' => 'Reseller',
        ],
        'show_in_rest' => true,
    ]);
    register_post_type('preflight', [
        'rewrite'      => [
            'with_front' => false,
            'has-archive' => false,
            'slug'       => 'baza-wiedzy/preflight',
        ],
        'has-archive' => false,
        'hierarchical' => true,
        'public'       => true,
        'supports'     => [ 'title', 'editor', 'page-attributes' ],
        'labels'       => [
            'name' => 'Preflight',
            'singular_name' => 'Preflight',
        ],
        'show_in_rest' => true,
    ]);
    register_post_type('podzlecanie', [
        'rewrite'      => [
            'with_front' => false,
            'has-archive' => false,
            'slug'       => 'baza-wiedzy/podzlecanie',
        ],
        'has-archive' => false,
        'hierarchical' => true,
        'public'       => true,
        'supports'     => [ 'title', 'editor', 'page-attributes' ],
        'labels'       => [
            'name' => 'Podzlecanie',
            'singular_name' => 'Podzlecanie',
        ],
        'show_in_rest' => true,
    ]);
}

add_action( 'init', function () {
    helpdesk_taxonomy();
    helpdesk_post_type();

    /* If that doesn't work, you can try switching them:
    helpdesk_post_type();
    helpdesk_taxonomy();
    */
} );






//function wpse_358157_parse_request( $wp ) {
//    $path      = 'baza-wiedzy'; // rewrite slug; no trailing slashes
//    $taxonomy  = 'kategorie';        // taxonomy slug
//    $post_type = 'helpdesk';                 // post type slug
//
//    if ( preg_match( '#^' . preg_quote( $path, '#' ) . '/#', $wp->request ) &&
//        isset( $wp->query_vars[ $taxonomy ] ) ) {
//        $slug = $wp->query_vars[ $taxonomy ];
//        $slug = ltrim( substr( $slug, strrpos( $slug, '/' ) ), '/' );
//
//        if ( ! term_exists( $slug, $taxonomy ) ) {
//            $wp->query_vars['name']       = $wp->query_vars[ $taxonomy ];
//            $wp->query_vars['post_type']  = $post_type;
//            $wp->query_vars[ $post_type ] = $wp->query_vars[ $taxonomy ];
//            unset( $wp->query_vars[ $taxonomy ] );
//        }
//    }
//}
add_action( 'parse_request', 'wpse_358157_parse_request' );

// Video post type
function tutorials_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Tutoriale',
            'singular_name' => 'Tutorial',
        ),
        'public' => true,
        'has_archive' => 'tutorials',
        'menu_icon' => 'dashicons-video-alt3',
        'supports' => array('title', 'editor'),
		'rewrite'      => [
                'with_front' => true,
				'has-archive' => 'tutorials',
				'slug'       => 'tutoriale',
            ],
    );
    register_post_type('tutoriale', $args);
}
add_action( 'init', 'tutorials_post_type' );

// Aktualizacje post type
function aktu_post_type() {
    $args = array(
        'labels' => array(
            'name' => 'Aktualizacje',
            'singular_name' => 'Aktualizacja',
        ),

        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-list-view',
        'supports' => array('title', 'editor'),
        'taxonomies'  => array( 'category' ),
    );
    register_post_type('aktualizacje', $args);
}
add_action( 'init', 'aktu_post_type' );

//add_filter( 'use_block_editor_for_post', '__return_false' );

/**
 * @param string $key
 * @return string
 */

function monthTranslator(string $key) {
    $month = rtrim(trim(strtolower($key)));
    switch($month) {
        case 'january':
            return 'styczeń';
        case 'february':
            return 'luty';
        case 'march':
            return 'marzec';
        case 'april':
            return 'kwiecień';
        case 'may':
            return 'maj';
        case 'june':
            return 'czerwiec';
        case 'july':
            return 'lipiec';
        case 'august':
            return 'sierpień';
        case 'september':
            return 'wrzesień';
        case 'october':
            return 'październik';
        case 'november':
            return 'listopad';
        case 'december':
            return 'grudzień';
        default :
        return $month;
    }
}

// Enable comments
function enable_comments_for_all(){
    global $wpdb;
    $wpdb->query( $wpdb->prepare("UPDATE $wpdb->posts SET comment_status = 'open'")); // Enable comments
    $wpdb->query( $wpdb->prepare("UPDATE $wpdb->posts SET ping_status = 'open'")); // Enable trackbacks
} enable_comments_for_all();

// Wydarzenia ACF
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Wydarzenia',
		'menu_title'	=> 'Wydarzenia',
		'menu_slug' 	=> 'wydarzenia',
		'capability'	=> 'edit_posts',
		'menu_icon' 	=> 'dashicons-calendar-alt',
		'redirect'		=> false
	));

}


?>