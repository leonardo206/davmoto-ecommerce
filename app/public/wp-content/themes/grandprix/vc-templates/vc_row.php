<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $full_width
 * @var $full_height
 * @var $equal_height
 * @var $columns_placement
 * @var $content_placement
 * @var $parallax
 * @var $parallax_image
 * @var $css
 * @var $el_id
 * @var $video_bg
 * @var $video_bg_url
 * @var $video_bg_parallax
 * @var $parallax_speed_bg
 * @var $parallax_speed_video
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row
 */
$el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $css_animation = $full_width = $equal_height = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = '';
$disable_element = '';
$output = $after_output = '';

/***** Our code modification - begin *****/

$row_content_width = $anchor = $content_text_aligment = $simple_background_color = $simple_background_image = $background_image_position = $disable_background_image = $parallax_background_image = $parallax_bg_speed = $parallax_bg_height = $animated_text = $animated_text_overlay_image = $animated_text_color = $animated_text_direction = $animated_text_position = $animated_text_vertical_position = $animated_text_enable_animation = $background_svg ='';
$mkdf_before_row_wrapper_start = $mkdf_row_wrapper_start = $mkdf_row_wrapper_end = '';

/***** Our code modification - end *****/

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

$css_classes = array(
	'vc_row',
	'wpb_row', //deprecated
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
);

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if (vc_shortcode_custom_css_has_property( $css, array('border', 'background') ) || $video_bg || $parallax) {
	$css_classes[]='vc_row-has-fill';
}

if (!empty($atts['gap'])) {
	$css_classes[] = 'vc_column-gap-'.$atts['gap'];
}

if ( ! empty( $atts['rtl_reverse'] ) ) {
	$css_classes[] = 'vc_rtl-columns-reverse';
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

if ( $min_height ) {
	$min_height = wpb_format_with_css_unit( $min_height );

	if ( strlen( $min_height ) > 0 ) {
		$wrapper_attributes[] = 'style="' . str_replace( '_', '-', 'min-height' ) . ': ' . $min_height . '"';
	}
}

if ( ! empty( $full_width ) ) {
	$wrapper_attributes[] = 'data-vc-full-width="true"';
	$wrapper_attributes[] = 'data-vc-full-width-init="false"';
	if ( 'stretch_row_content' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
	} elseif ( 'stretch_row_content_no_spaces' === $full_width ) {
		$wrapper_attributes[] = 'data-vc-stretch-content="true"';
		$css_classes[] = 'vc_row-no-padding';
	}
	$after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
}

if ( ! empty( $full_height ) ) {
	$css_classes[] = 'vc_row-o-full-height';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;
		if ( 'stretch' === $columns_placement ) {
			$css_classes[] = 'vc_row-o-equal-height';
		}
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}

/***** Our code modification - begin *****/

if ( ! empty( $anchor ) ) {
	$wrapper_attributes[] = 'data-mkdf-anchor="' . esc_attr( $anchor ) . '"';
}

$grid_row_class = $grid_row_data = $mkdf_vc_row_style = $mkdf_grid_row_style = array();

if ( $row_content_width !== 'grid' ) {
	if ( ! empty( $disable_background_image ) ) {
		$css_classes[] = 'mkdf-disabled-bg-image-bellow-' . esc_attr( $disable_background_image );
	}
	
	if ( ! empty( $simple_background_color ) ) {
		$mkdf_vc_row_style[] = 'background-color:' . esc_attr( $simple_background_color );
	}
	
	if ( ! empty( $simple_background_image ) ) {
		$image_src            = wp_get_attachment_image_src( $simple_background_image, 'full' );
		$mkdf_vc_row_style[] = 'background-image: url(' . esc_url( $image_src[0] ) . ')';
	}
	
	if ( ! empty( $background_image_position ) ) {
		$mkdf_vc_row_style[] = 'background-position: ' . esc_attr( $background_image_position );
	}
	
	if ( ! empty( $parallax_background_image ) ) {
		$image_src = wp_get_attachment_image_src( $parallax_background_image, 'full' );
		
		$css_classes[]        = 'mkdf-parallax-row-holder';
		$wrapper_attributes[] = 'data-parallax-bg-image="' . esc_url( $image_src[0] ) . '"';
		
		if ( $parallax_bg_speed !== '' ) {
			$wrapper_attributes[] = 'data-parallax-bg-speed="' . esc_attr( $parallax_bg_speed ) . '"';
		} else {
			$wrapper_attributes[] = 'data-parallax-bg-speed="1"';
		}
		
		if ( ! empty( $parallax_bg_height ) ) {
			$wrapper_attributes[] = 'data-parallax-bg-height="' . esc_attr( $parallax_bg_height ) . '"';
		}
	}
	
	if ( ! empty( $content_text_aligment ) ) {
		$css_classes[] = 'mkdf-content-aligment-' . esc_attr( $content_text_aligment );
	}
	
} else {
	if ( ! empty( $disable_background_image ) ) {
		$grid_row_class[] = 'mkdf-disabled-bg-image-bellow-' . esc_attr( $disable_background_image );
	}
	
	if ( ! empty( $simple_background_color ) ) {
		$mkdf_grid_row_style[] = 'background-color:' . esc_attr( $simple_background_color );
	}
	
	if ( ! empty( $simple_background_image ) ) {
		$image_src              = wp_get_attachment_image_src( $simple_background_image, 'full' );
		$mkdf_grid_row_style[] = 'background-image: url(' . esc_url( $image_src[0] ) . ')';
	}
	
	if ( ! empty( $background_image_position ) ) {
		$mkdf_grid_row_style[] = 'background-position: ' . esc_attr( $background_image_position );
	}
	
	if ( ! empty( $parallax_background_image ) ) {
		$image_src = wp_get_attachment_image_src( $parallax_background_image, 'full' );
		
		$grid_row_class[] = 'mkdf-parallax-row-holder';
		$grid_row_data[]  = 'data-parallax-bg-image=' . esc_url( $image_src[0] );
		
		if ( $parallax_bg_speed !== '' ) {
			$grid_row_data[] = 'data-parallax-bg-speed=' . esc_attr( $parallax_bg_speed );
		} else {
			$grid_row_data[] = 'data-parallax-bg-speed=1';
		}
		
		if ( ! empty( $parallax_bg_height ) ) {
			$grid_row_data[] = 'data-parallax-bg-height=' . esc_attr( $parallax_bg_height );
		}
	}
	
	if ( ! empty( $content_text_aligment ) ) {
		$grid_row_class[] = 'mkdf-content-aligment-' . esc_attr( $content_text_aligment );
	}
}

$grid_row_classes = '';
if ( ! empty( $grid_row_class ) ) {
	$grid_row_classes = implode( ' ', $grid_row_class );
}

$grid_row_datas = '';
if ( ! empty( $grid_row_data ) ) {
	$grid_row_datas = implode( ' ', $grid_row_data );
}

$mkdf_vc_row_styles = '';
if ( ! empty( $mkdf_vc_row_style ) ) {
	$mkdf_vc_row_styles = implode( ';', $mkdf_vc_row_style );
}

$mkdf_grid_row_styles = '';
if ( ! empty( $mkdf_grid_row_style ) ) {
	$mkdf_grid_row_styles = implode( ';', $mkdf_grid_row_style );
}

if ( $row_content_width === 'grid' ) {
	$mkdf_row_wrapper_start .= '<div class="mkdf-row-grid-section-wrapper ' . esc_attr( $grid_row_classes ) . '" ' . esc_attr( $grid_row_datas ) . ' ' . grandprix_mikado_get_inline_style( $mkdf_grid_row_styles ) . '><div class="mkdf-row-grid-section">';
	$mkdf_row_wrapper_end   .= '</div></div>';
}

$mkdf_after_wrapper_open   = apply_filters('grandprix_mikado_filter_vc_after_wrapper_open', '', $atts);
$mkdf_before_wrapper_close = apply_filters('grandprix_mikado_filter_vc_before_wrapper_close', '', $atts);
$css_classes               = apply_filters('grandprix_mikado_filter_vc_css_classes', $css_classes, $atts);

/***** Vertical Lines Start*****/

if ( $vertical_lines === 'yes' ) {
	$lines_output = '';
	$lines_output .= '<div class="mkdf-vertical-lines">';
	for ( $n = 0; $n < 3; $n ++ ) {
		$lines_output .= '<span class="mkdf-vertical-line"></span>';
	}
	$lines_output .= '</div>';
	$mkdf_after_wrapper_open .= $lines_output;
}


/***** Vertical Lines End*****/

/***** Animated Text*****/

if ( ! empty( $animated_text ) ) {
	$new_params         = array();
	$new_params['text'] = $animated_text;
	
	if ( ! empty( $animated_text_overlay_image ) ) {
		$new_params['text_overlay_image'] = $animated_text_overlay_image;
	}
	
	if ( ! empty( $animated_text_color ) ) {
		$new_params['color'] = $animated_text_color;
	}
	
	if ( ! empty( $animated_text_width ) ) {
		$new_params['outline_width'] = $animated_text_width;
	}
	
	if ( ! empty( $animated_text_direction ) ) {
		$new_params['text_direction'] = $animated_text_direction;
	}
	
	if ( ! empty( $animated_text_position ) ) {
		$new_params['text_position'] = $animated_text_position;
	}
	
	if ( empty( $animated_text_vertical_position ) ) {
		$animated_text_vertical_position = 'middle';
	}
	
	if ( $animated_text_enable_animation === 'no' ) {
		$new_params['enable_animation'] = 'no';
	}
	
	$css_classes[]            = 'mkdf-row-animated-background-text mkdf-animated-background-text-' . esc_attr( $animated_text_direction ) . '-' . esc_attr( $animated_text_position ). ' mkdf-animated-background-text-' . esc_attr( $animated_text_vertical_position );
	$mkdf_after_wrapper_open .= grandprix_mikado_execute_shortcode( 'mkdf_animated_text', $new_params );
}

/***** Animated Text End*****/

/***** Animated SVG Background Start*****/

if ( ! empty( $background_svg ) ) {
	$background_svg                = function_exists( 'grandprix_mikado_get_bg_svg_part' ) ? grandprix_mikado_get_bg_svg_part( $background_svg ) : '';
	$background_svg_output         = '';
	$background_svg_output         .= '<div class="mkdf-animated-background-svg">';
	$background_svg_output         .= grandprix_mikado_get_module_part( $background_svg );
	$background_svg_output         .= '</div>';
	
	if ( $row_content_width !== 'grid' ) {
		$mkdf_after_wrapper_open .= $background_svg_output;
	} else {
		$mkdf_row_wrapper_start .= $background_svg_output;
	}
	
}

/***** Animated SVG Background End*****/

/***** Our code modification - end *****/

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

$output .= $mkdf_row_wrapper_start;
$output .= '<div ' . implode( ' ', $wrapper_attributes ) . ' ' . grandprix_mikado_get_inline_style( $mkdf_vc_row_styles ) . '>';
$output .= $mkdf_after_wrapper_open;
$output .= wpb_js_remove_wpautop( $content );
$output .= $mkdf_before_wrapper_close;
$output .= '</div>';
$output .= $mkdf_row_wrapper_end;
$output .= $after_output;

echo grandprix_mikado_get_module_part( $output );
