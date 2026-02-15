<?php
namespace GrandPrixCore\CPT\Shortcodes\ItemsShowcaseCustom;

use GrandPrixCore\Lib;

class ItemsShowcaseCustom implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_items_showcase_custom';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Items Showcase Custom', 'grandprix-core' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-items-showcase-custom extended-custom-icon',
					'category'                  => esc_html__( 'by GRANDPRIX', 'grandprix-core' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'grandprix-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'grandprix-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Info Position', 'grandprix-core' ),
							'value'       => array(
								esc_html__( 'Left', 'grandprix-core' )  => 'text-left',
								esc_html__( 'Right', 'grandprix-core' ) => 'text-right'
							),
							'save_always' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'appear_animation',
							'heading'    => esc_html__( 'Enable Appear Animation', 'grandprix-core' ),
							'value'      => array_flip( grandprix_mikado_get_yes_no_select_array( false, true) ),
						),
						array(
							'type'       => 'param_group',
							'heading'    => esc_html__('Item Showcase Content', 'grandprix-core'),
							'param_name' => 'item_showcase_content',
							'value'      => '',
							'params'     => array(
								array(
									'type'        => 'attach_image',
									'param_name'  => 'image',
									'heading'     => esc_html__('Image', 'grandprix-core'),
									'description' => esc_html__('Select image from media library', 'grandprix-core')
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'info_title_1',
									'heading'     => esc_html__('Info Section One Title', 'grandprix-core'),
									'description' => esc_html__('', 'grandprix-core')
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'info_text_1',
									'heading'     => esc_html__('Info Section One Text', 'grandprix-core'),
									'description' => esc_html__('', 'grandprix-core')
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'info_link_1',
									'heading'     => esc_html__('Info Section One Link', 'grandprix-core'),
									'description' => esc_html__('', 'grandprix-core')
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'info_link_text_1',
									'heading'     => esc_html__( 'Info Section One Link Text', 'grandprix-core' ),
									'description' => esc_html__( '', 'grandprix-core' ),
									'dependency'  => array( 'element' => 'info_link_1', 'not_empty' => true )
								),
								array(
									'type'       => 'dropdown',
									'param_name' => 'info_link_target_1',
									'heading'    => esc_html__( 'Info Section One Link Target', 'grandprix-core' ),
									'value'      => array_flip( grandprix_mikado_get_link_target_array() ),
									'dependency' => array( 'element' => 'info_link_1', 'not_empty' => true )
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'info_title_2',
									'heading'     => esc_html__('Info Section Two Title', 'grandprix-core'),
									'description' => esc_html__('', 'grandprix-core')
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'info_text_2',
									'heading'     => esc_html__('Info Section Two Text', 'grandprix-core'),
									'description' => esc_html__('', 'grandprix-core')
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'info_link_2',
									'heading'     => esc_html__('Info Section Two Link', 'grandprix-core'),
									'description' => esc_html__('', 'grandprix-core')
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'info_link_text_2',
									'heading'     => esc_html__( 'Info Section Two Link Text', 'grandprix-core' ),
									'description' => esc_html__( '', 'grandprix-core' ),
									'dependency'  => array( 'element' => 'info_link_2', 'not_empty' => true )
								),
								array(
									'type'        => 'dropdown',
									'param_name'  => 'info_link_target_2',
									'heading'     => esc_html__( 'Info Section Two Link Target', 'grandprix-core' ),
									'value'       => array_flip( grandprix_mikado_get_link_target_array() ),
									'description' => esc_html__( '', 'grandprix-core' ),
									'dependency'  => array( 'element' => 'info_link_2', 'not_empty' => true )
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'info_title_3',
									'heading'     => esc_html__('Info Section Three Title', 'grandprix-core'),
									'description' => esc_html__('', 'grandprix-core')
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'info_text_3',
									'heading'     => esc_html__('Info Section Three Text', 'grandprix-core'),
									'description' => esc_html__('', 'grandprix-core')
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'info_link_3',
									'heading'     => esc_html__('Info Section Three Link', 'grandprix-core'),
									'description' => esc_html__('', 'grandprix-core')
								),
								array(
									'type'        => 'textfield',
									'param_name'  => 'info_link_text_3',
									'heading'     => esc_html__( 'Info Section Three Link Text', 'grandprix-core' ),
									'description' => esc_html__( '', 'grandprix-core' ),
									'dependency'  => array( 'element' => 'info_link_3', 'not_empty' => true )
								),
								array(
									'type'        => 'dropdown',
									'param_name'  => 'info_link_target_3',
									'heading'     => esc_html__( 'Info Section Three Link Target', 'grandprix-core' ),
									'description' => esc_html__( '', 'grandprix-core' ),
									'value'       => array_flip( grandprix_mikado_get_link_target_array() ),
									'dependency'  => array( 'element' => 'info_link_3', 'not_empty' => true )
								)
							)
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'custom_class'       => '',
			'type'               => 'text-left',
			'image'              => '',
			'info_title_1'       => '',
			'info_text_1'        => '',
			'info_link_1'        => '',
			'info_link_text_1'   => '',
			'info_link_target_1' => '',
			'info_title_2'       => '',
			'info_text_2'        => '',
			'info_link_2'        => '',
			'info_link_text_2'   => '',
			'info_link_target_2' => '',
			'info_title_3'       => '',
			'info_text_3'        => '',
			'info_link_3'        => '',
			'info_link_text_3'   => '',
			'info_link_target_3' => '',
			'appear_animation'    => 'yes',
		);
		
		$params       = shortcode_atts( $default_atts, $atts );
		
		$params['type'] = ! empty( $params['type'] ) ? $params['type'] : $default_atts['type'];
		$params['items_showcase_custom'] = vc_param_group_parse_atts($atts['item_showcase_content']);
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['main_image']     = $this->getMainImage( $params );
		
		return grandprix_core_get_shortcode_module_template_part( 'templates/items-showcase-custom-item', 'items-showcase-custom', '', $params );
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['type'] ) ? 'mkdf-issc-' . $params['type'] : '';
		$holderClasses[] = isset($params['appear_animation']) && ( $params['appear_animation'] == 'yes') ? 'mkdf-has-appear-animation' : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getMainImage( $params ) {
		$main_image = array();
		
		if ( ! empty( $params['image'] ) ) {
			$id = $params['image'];
			
			$main_image['image_id'] = $id;
			$main_image_original    = wp_get_attachment_image_src( $id, 'full' );
			$main_image['url']      = $main_image_original[0];
			$main_image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
		}
		
		return $main_image;
	}
}