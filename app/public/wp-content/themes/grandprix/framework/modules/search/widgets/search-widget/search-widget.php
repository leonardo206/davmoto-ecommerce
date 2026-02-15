<?php

if ( class_exists( 'GrandPrixCoreClassWidget' ) ) {
	class GrandPrixMikadoClassSearchWidget extends GrandPrixCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_search_widget',
				esc_html__( 'GrandPrix Search Widget', 'grandprix' ),
				array( 'description' => esc_html__( 'Display a "search" field with search form', 'grandprix' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			
			$search_icon_params = array();
			
			$search_icon_pack_params = array(
				array(
					'type'        => 'textfield',
					'name'        => 'search_icon_size',
					'title'       => esc_html__( 'Icon Size (px)', 'grandprix' ),
					'description' => esc_html__( 'Define size for search icon', 'grandprix' )
				)
			);
			
			if ( grandprix_mikado_options()->getOptionValue( 'search_icon_pack' ) == 'icon_pack' ) {
				$this->params = array_merge( $search_icon_pack_params, $search_icon_params );
			} else {
				$this->params = $search_icon_params;
			}
		}
		
		public function widget( $args, $instance ) {
			
			?>
			
		<?php }
	}
}