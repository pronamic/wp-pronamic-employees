<?php

/**
 * Base Frontend Plugin for Pronamic Employees
 * 
 * @package Pronamic
 * @subpackage Employees
 */
class Pronamic_Employees_Plugin {

	public function __construct() {
		add_action( 'init', array( $this, 'register_post_type' ) );
	}

	/**
	 * Makes the pronamic_employee post type.
	 */
	public function register_post_type() {

		$pronamic_employee_labels = array(
			'name'               => _x( 'Employees', 'Plural for Post Type Label', 'pronamic_employees' ),
			'singular_name'      => _x( 'Employee', 'Singular for Post Type Label', 'pronamic_employees' ),
			'add_new'            => _x( 'Add New', 'employee', 'pronamic_employees' ),
			'add_new_item'       => __( 'Add New Employee', 'pronamic_employees' ),
			'edit_item'          => __( 'Edit Employee', 'pronamic_employees' ),
			'new_item'           => __( 'New Employee', 'pronamic_employees' ),
			'view_item'          => __( 'View Employee', 'pronamic_employees' ),
			'search_items'       => __( 'Search Employees', 'pronamic_employees' ),
			'not_found'          => __( 'No employees found', 'pronamic_employees' ),
			'not_found_in_trash' => __( 'No employees found in Trash', 'pronamic_employees' ),
			'menu_name'          => __( 'Employees', 'pronamic_employees' ),
		);
		
		$slug_pronamic_employee = get_option( 'pronamic_employees_post_type_slug' );
		$slug_pronamic_employee = ( ! empty( $slug_pronamic_employee ) ? $slug_pronamic_employee : _x( 'employee', 'Employee Default URI Slug', 'pronamic_employees' ) );

		$pronamic_employee_arguments = array(
			'labels' => $pronamic_employee_labels,
			'public' => true,
			'publicily_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => $slug_pronamic_employee ),
			'capability_type' => 'post',
			'has_archive' => true,
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt'
			)
		);

		register_post_type( 'pronamic_employee', $pronamic_employee_arguments );
		
		$employee_category_labels = array(
			'name'                       => _x( 'Employee Categories', 'Plural for Taxonomy Type Label', 'pronamic_employees' ),
			'singular_name'              => _x( 'Employee Category', 'Singular for Taxonomy Type Label', 'pronamic_employees' ),
			'all_items'                  => __( 'All Employee Categories', 'pronamic_employees' ),
			'edit_item'                  => __( 'Edit Employee Category', 'pronamic_employees' ),
			'view_item'                  => __( 'View Employee Category', 'pronamic_employees' ),
			'update_item'                => __( 'Update Employee Category', 'pronamic_employees' ),
			'add_new_item'               => __( 'Add New Employee Category', 'pronamic_employees' ),
			'new_item_name'              => __( 'New Employee Category Name', 'pronamic_employees' ),
			'parent_item'                => __( 'Parent Employee Category', 'pronamic_employees' ),
			'parent_item_colon'          => __( 'Parent Employee Category:', 'pronamic_employees' ),
			'search_items'               => __( 'Search Employee Categories', 'pronamic_employees' ),
			'popular_items'              => __( 'Popular Employee Categories', 'pronamic_employees' ),
			'seperate_items_with_commas' => __( 'Seperate Employee Categories with commas', 'pronamic_employees' ),
			'add_or_remove_items'        => __( 'Add or remove employee categories' ),
			'choose_from_most_used'      => __( 'Choose from the most used employee categories', 'pronamic_employees' ),
			'not_found'                  => __( 'No employee categories found' )
		);
		
		$slug_employee_category = get_option( 'pronamic_employees_taxonomy_category_slug' );
		$slug_employee_category = ( ! empty( $slug_employee_category ) ? $slug_employee_category : _x( 'category', 'Employee Category Default URI Slug', 'pronamic_employees' ) );
		
		$employee_category_arguments = array(
			'labels'       => $employee_category_labels,
			'hierarchical' => true,
			'rewrite'      => array( 'slug' => $slug_employee_category )
		);
		
		register_taxonomy( 'employee_category', 'pronamic_employee', $employee_category_arguments );
		register_taxonomy_for_object_type( 'employee_category', 'pronamic_employee' );
	}
}