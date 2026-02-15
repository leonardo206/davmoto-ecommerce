<?php

if ( ! function_exists( 'grandprix_mikado_register_search_post_type_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function grandprix_mikado_register_search_post_type_widget( $widgets ) {
		$widgets[] = 'GrandPrixMikadoClassSearchPostType';
		
		return $widgets;
	}
	
	add_filter( 'grandprix_core_filter_register_widgets', 'grandprix_mikado_register_search_post_type_widget' );
}

if ( ! function_exists( 'grandprix_mikado_search_post_types' ) ) {
	function grandprix_mikado_search_post_types() {
		
		if ( empty( $_POST ) || ! isset( $_POST ) ) {
			grandprix_mikado_ajax_status( 'error', esc_html__( 'All fields are empty', 'grandprix' ) );
		} else {
			check_ajax_referer( 'mkdf_search_post_types_nonce', 'search_post_types_nonce' );
			
			$args = array(
				'post_type'      => sanitize_text_field( $_POST['postType'] ),
				'post_status'    => 'publish',
				'order'          => 'DESC',
				'orderby'        => 'date',
				's'              => sanitize_text_field( $_POST['term'] ),
				'posts_per_page' => 5
			);
			
			$html  = '';
			$query = new WP_Query( $args );
			
			if ( $query->have_posts() ) {
				$html .= '<ul>';
					while ( $query->have_posts() ) {
						$query->the_post();
						$html .= '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
					}
				$html              .= '</ul>';
				$json_data['html'] = $html;
				grandprix_mikado_ajax_status( 'success', '', $json_data );
			} else {
				$html              .= '<ul>';
					$html              .= '<li>' . esc_html__( 'No posts found.', 'grandprix' ) . '</li>';
				$html              .= '</ul>';
				$json_data['html'] = $html;
				grandprix_mikado_ajax_status( 'success', '', $json_data );
			}
		}
		
		wp_die();
	}
	
	add_action( 'wp_ajax_grandprix_mikado_search_post_types', 'grandprix_mikado_search_post_types' );
    add_action( 'wp_ajax_nopriv_grandprix_mikado_search_post_types', 'grandprix_mikado_search_post_types' );
}