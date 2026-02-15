<?php

if ( ! function_exists( 'grandprix_core_action_like' ) ) {
	/**
	 * Returns GrandPrixMikadoClassLike instance
	 *
	 * @return GrandPrixMikadoClassLike
	 */
	function grandprix_core_action_like() {
		return GrandPrixMikadoClassLike::get_instance();
	}
}

function grandprix_core_get_like() {
	
	echo wp_kses( grandprix_core_action_like()->add_like(), array(
		'span'  => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'     => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'     => array(
			'href'         => true,
			'class'        => true,
			'id'           => true,
			'title'        => true,
			'style'        => true,
			'data-post-id' => true
		),
		'input' => array(
			'type'  => true,
			'name'  => true,
			'id'    => true,
			'value' => true
		)
	) );
}