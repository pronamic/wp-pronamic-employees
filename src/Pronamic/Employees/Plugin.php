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

		$pronamic_employee_arguments = array(
			'labels' => $pronamic_employee_labels,
			'public' => true,
			'publicily_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array( 
				'slug' => get_option( 
					'pronamic_employees_post_type_slug', 
					_x( 'employee', 'Employee Default URI Slug', 'pronamic_employees' ) 
				) 
			),
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
	}
}