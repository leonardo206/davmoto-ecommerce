<?php

namespace GrandPrixCore\CPT\Testimonials;

use GrandPrixCore\Lib;

/**
 * Class TestimonialsRegister
 * @package GrandPrixCore\CPT\Testimonials
 */
class TestimonialsRegister implements Lib\PostTypeInterface {
	private $base;
	private $taxBase;

	public function __construct() {
		$this->base    = 'testimonials';
		$this->taxBase = 'testimonials-category';
	}
	
	/**
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}
	
	/**
	 * Registers custom post type with WordPress
	 */
	public function register() {
		$this->registerPostType();
		$this->registerTax();
	}
	
	/**
	 * Regsiters custom post type with WordPress
	 */
	private function registerPostType() {
		$menuPosition = 5;
		$menuIcon     = 'dashicons-format-quote';
		
		register_post_type( 'testimonials',
			array(
				'labels'        => array(
					'menu_name'     => esc_html__( 'GrandPrix Testimonials', 'grandprix-core' ),
					'name'          => esc_html__( 'Testimonials', 'grandprix-core' ),
					'singular_name' => esc_html__( 'Testimonial', 'grandprix-core' ),
					'add_item'      => esc_html__( 'New Testimonial', 'grandprix-core' ),
					'add_new_item'  => esc_html__( 'Add New Testimonial', 'grandprix-core' ),
					'edit_item'     => esc_html__( 'Edit Testimonial', 'grandprix-core' )
				),
				'public'        => false,
				'show_in_menu'  => true,
				'rewrite'       => array( 'slug' => 'testimonials' ),
				'menu_position' => $menuPosition,
				'show_ui'       => true,
				'has_archive'   => false,
				'hierarchical'  => false,
				'supports'      => array( 'title', 'thumbnail' ),
				'menu_icon'     => $menuIcon
			)
		);
	}
	
	/**
	 * Registers custom taxonomy with WordPress
	 */
	private function registerTax() {
		$labels = array(
			'name'              => esc_html__( 'Testimonials Categories', 'grandprix-core' ),
			'singular_name'     => esc_html__( 'Testimonial Category', 'grandprix-core' ),
			'search_items'      => esc_html__( 'Search Testimonials Categories', 'grandprix-core' ),
			'all_items'         => esc_html__( 'All Testimonials Categories', 'grandprix-core' ),
			'parent_item'       => esc_html__( 'Parent Testimonial Category', 'grandprix-core' ),
			'parent_item_colon' => esc_html__( 'Parent Testimonial Category:', 'grandprix-core' ),
			'edit_item'         => esc_html__( 'Edit Testimonials Category', 'grandprix-core' ),
			'update_item'       => esc_html__( 'Update Testimonials Category', 'grandprix-core' ),
			'add_new_item'      => esc_html__( 'Add New Testimonials Category', 'grandprix-core' ),
			'new_item_name'     => esc_html__( 'New Testimonials Category Name', 'grandprix-core' ),
			'menu_name'         => esc_html__( 'Testimonials Categories', 'grandprix-core' )
		);
		
		register_taxonomy( $this->taxBase, array( $this->base ), array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'query_var'         => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'testimonials-category' )
		) );
	}
}