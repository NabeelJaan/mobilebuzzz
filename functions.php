<?php

/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
			'footer' => __( 'Footer Menu', 'tailpress' ),
		)
	);

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

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'editor-styles' );
	add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'tailpress_setup' );

// GB Blocks
require_once get_template_directory() . '/inc/gb-blocks.php';

// customizer
require_once get_template_directory() . '/inc/customizer.php';

// Image sizes
add_image_size('featured-img', 126, 189);

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$theme = wp_get_theme();
	wp_enqueue_style('monoSpace', 'https://fonts.googleapis.com/css2?family=Space+Mono&display=swap');
	wp_enqueue_style('oswald', 'https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap');
	wp_enqueue_style( 'poppins', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap' );

	wp_enqueue_style( 'tailpress', tailpress_asset( 'css/app.css' ), array(), $theme->get( 'Version' ) );

	wp_enqueue_script( 'tailpress', tailpress_asset( 'js/app.js' ), array(), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );


function create_mobile_post_type() {
    $labels = array(
        'name'                  => 'Mobiles',
        'singular_name'         => 'Mobile',
        'menu_name'             => 'Mobiles',
        'name_admin_bar'        => 'Mobile',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Mobile',
        'new_item'              => 'New Mobile',
        'edit_item'             => 'Edit Mobile',
        'view_item'             => 'View Mobile',
        'all_items'             => 'All Mobiles',
        'search_items'          => 'Search Mobiles',
        'not_found'             => 'No mobiles found.',
        'not_found_in_trash'    => 'No mobiles found in Trash.',
        'parent_item_colon'     => 'Parent Mobile:',
        'archives'              => 'Mobile Archives',
        'insert_into_item'      => 'Insert into mobile',
        'uploaded_to_this_item' => 'Uploaded to this mobile',
        'filter_items_list'     => 'Filter mobiles list',
        'items_list_navigation' => 'Mobiles list navigation',
        'items_list'            => 'Mobiles list',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'mobile'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    );

    register_post_type('mobile', $args);
}

add_action('init', 'create_mobile_post_type');



function create_mobile_taxonomy() {
    $labels = array(
        'name'              => 'Brand',
        'singular_name'     => 'Brand',
        'search_items'      => 'Search Brand',
        'all_items'         => 'All Brand',
        'parent_item'       => 'Parent Brand',
        'parent_item_colon' => 'Parent Brand:',
        'edit_item'         => 'Edit Brand',
        'update_item'       => 'Update Brand',
        'add_new_item'      => 'Add New Brand',
        'new_item_name'     => 'New Brand Name',
        'menu_name'         => 'Brand',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'brand'),
    );

    register_taxonomy('brand', array('mobile'), $args);
}

add_action('init', 'create_mobile_taxonomy');


function custom_breadcrumb() {
    
    echo '<div class="flex items-center mb-5">';
    echo '<a class="text-[#0984e3]" href="' . home_url() . '">Home</a>';

    if (is_singular('mobile')) { // Replace 'your_cpt_slug' with your custom post type slug
        echo '<svg class="w-[9px] mx-[5px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5 12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>';
        
        // Get custom taxonomy terms
        $terms = get_the_terms(get_the_ID(), 'mobile-type');
        
        if ($terms && !is_wp_error($terms)) {
            $term = array_shift($terms);
            echo '<a class="text-[#0984e3]" href="' . get_term_link($term) . '">' . $term->name . '</a>';
        }
        
        echo '<svg class="w-[9px] mx-[5px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5 12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>';
        echo '<span>' . get_the_title() . '</span>';
    } elseif (is_category() || is_single()) {
        echo '<svg class="w-[9px] mx-[5px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5 12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>';
        the_category(' ');

        if (is_single()) {
            echo '<svg class="w-[9px] mx-[5px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5 12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>';
            the_title();
        }
    } elseif (is_page()) {
        echo '<svg class="w-[9px] mx-[5px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5 12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg>';
        echo the_title();
    }

    echo '</div>';
}



