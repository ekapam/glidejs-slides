<?php
/**
 *
 * Custom Class for Glide.js Shortcode.
 *
 * @package     Glide.js Slides Shortcode
 */

/**
 * Class declaration
 */
class GlidejsShortcode {

	/**
	 * Register new post type.
	 *
	 * @return void
	 */
	public static function register_glidejs_shortcode() {
		add_action( 'init', 'GlidejsShortcode::register_post_type_taxonomy', 0 );
	}

	/**
	 * Lables, Arguments and Taxonomy declaration function.
	 *
	 * @return void
	 */
	public static function register_post_type_taxonomy() {
		$labels = array(
			'name'               => __( 'Glide.js Slides', 'post type general name' ),
			'singular_name'      => __( 'Slide', 'post type singular name' ),
			'add_new'            => __( 'Add New Glide.js Slide', 'New Glide.js Slide' ),
			'add_new_item'       => __( 'New Glide.js Slide' ),
			'edit_item'          => __( 'Edit Glide.js Slide', 'glidejs-slides' ),
			'new_item'           => __( 'New Glide.js Slide', 'glidejs-slides' ),
			'view_item'          => __( 'View Glide.js Slide', 'glidejs-slides' ),
			'view_items'         => __( 'View Glide.js Slides', 'glidejs-slides' ),
			'search_items'       => __( 'Search Glide.js Slide', 'glidejs-slides' ),
			'not_found'          => __( 'No records found', 'glidejs-slides' ),
			'not_found_in_trash' => __( 'No records found in trash', 'glidejs-slides' ),
			'parent_item_colon'  => '',
			'menu_name'          => __( 'Glide.js Slides', 'glidejs-slides' ),
		);

		$args = array(
			'labels'              => $labels,
			'label'               => 'glidejs_slide',
			'description'         => 'Glide Slides',
			'public'              => false,
			'hierarchical'        => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'show_in_rest'        => false,
			'menu_icon'           => 'dashicons-cover-image',
			'capability_type'     => 'post',
			'supports'            => array( 'title', 'revisions', 'thumbnail' ),
			'taxonomies'          => array( 'glidejs-slides' ),
			'menu_position'       => 100,
			'can_export'          => false,
			'has_archive'         => false,
			'rewrite'             => array( 'slug' => 'glide_slide' ),

		);
		register_post_type( 'glidejs_slide', $args );

		register_taxonomy(
			'glidejs-slides',
			'glidejs_slide',
			array(
				'labels'             => array(
					'name'         => __( 'Glide.js Slides Categories', 'glidejs-slides' ),
					'menu_name'    => __( 'Glide.js Slides Categories', 'glidejs-slides' ),
					'add_new'      => __( 'Add new Glide.js Slides Category', 'glidejs-slides' ),
					'add_new_item' => __( 'Add new Glide.js Slides Category', 'glidejs-slides' ),
					'edit_item'    => __( 'Edit Glide.js Slides Category Topic', 'glidejs-slides' ),
					'update_item'  => __( 'Edit Glide.js Slides Category Topic', 'glidejs-slides' ),
					'view_item'    => __( 'View Glide.js Slides Category Topic', 'glidejs-slides' ),
					'search_items' => __( 'Search a Glide.js Slides Category', 'glidejs-slides' ),
				),
				'public'             => true,
				'publicly_queryable' => true,
				'show_in_nav_menus'  => true,
				'show_admin_column'  => true,
				'show_in_rest'       => true,
				'show_tagcloud'      => true,
				'show_in_nav_menus'  => true,
				'show_ui'            => true,
				'query_var'          => true,
				'slug'               => 'glidejs-slides',
				'hierarchical'       => true,
			)
		);
	}
}
