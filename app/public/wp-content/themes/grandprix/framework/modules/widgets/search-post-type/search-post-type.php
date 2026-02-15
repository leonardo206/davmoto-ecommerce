<?php

if ( class_exists( 'GrandPrixCoreClassWidget' ) ) {
	class GrandPrixMikadoClassSearchPostType extends GrandPrixCoreClassWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_search_post_type',
				esc_html__( 'GrandPrix Search Post Type', 'grandprix' ),
				array( 'description' => esc_html__( 'Select post type that you want to be searched for', 'grandprix' ) )
			);
			
			$this->setParams();
		}
		
		protected function setParams() {
			$post_types = apply_filters( 'grandprix_mikado_filter_search_post_type_widget_params_post_type', array( 'post' => esc_html__( 'Post', 'grandprix' ) ) );
			
			$this->params = array(
				array(
					'type'        => 'dropdown',
					'name'        => 'post_type',
					'title'       => esc_html__( 'Post Type', 'grandprix' ),
					'description' => esc_html__( 'Choose post type that you want to be searched for', 'grandprix' ),
					'options'     => $post_types
				)
			);
		}
		
		public function widget( $args, $instance ) {
			$search_type_class = 'mkdf-search-post-type';
			$post_type         = $instance['post_type'];
			?>
			<div class="widget mkdf-search-post-type-widget">
				<div data-post-type="<?php echo esc_attr( $post_type ); ?>" <?php grandprix_mikado_class_attribute( $search_type_class ); ?>>
					<input class="mkdf-post-type-search-field" value="" placeholder="<?php esc_attr_e( 'Search Here', 'grandprix' ) ?>">
					<i class="mkdf-search-icon mkdf-icon-font-elegant icon_search" aria-hidden="true"></i>
					<i class="mkdf-search-loading fa fa-spinner fa-spin mkdf-hidden" aria-hidden="true"></i>
					<?php wp_nonce_field( 'mkdf_search_post_types_nonce', 'mkdf_search_post_types_nonce' ); ?>
				</div>
				<div class="mkdf-post-type-search-results"></div>
			</div>
		<?php }
	}
}