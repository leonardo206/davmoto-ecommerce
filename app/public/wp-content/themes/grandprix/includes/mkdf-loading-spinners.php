<?php

if ( ! function_exists( 'grandprix_mikado_loading_spinners' ) ) {
	function grandprix_mikado_loading_spinners() {
		$id           = grandprix_mikado_get_page_id();
		$spinner_type = grandprix_mikado_get_meta_field_intersect( 'smooth_pt_spinner_type', $id );
		
		$spinner_html = '';
		if ( ! empty( $spinner_type ) ) {
			switch ( $spinner_type ) {
				case 'grandprix_spinner':
					$spinner_html = grandprix_mikado_loading_spinner_grandprix();
					break;
				case 'rotate_circles':
					$spinner_html = grandprix_mikado_loading_spinner_rotate_circles();
					break;
				case 'pulse':
					$spinner_html = grandprix_mikado_loading_spinner_pulse();
					break;
				case 'double_pulse':
					$spinner_html = grandprix_mikado_loading_spinner_double_pulse();
					break;
				case 'cube':
					$spinner_html = grandprix_mikado_loading_spinner_cube();
					break;
				case 'rotating_cubes':
					$spinner_html = grandprix_mikado_loading_spinner_rotating_cubes();
					break;
				case 'stripes':
					$spinner_html = grandprix_mikado_loading_spinner_stripes();
					break;
				case 'wave':
					$spinner_html = grandprix_mikado_loading_spinner_wave();
					break;
				case 'two_rotating_circles':
					$spinner_html = grandprix_mikado_loading_spinner_two_rotating_circles();
					break;
				case 'five_rotating_circles':
					$spinner_html = grandprix_mikado_loading_spinner_five_rotating_circles();
					break;
				case 'atom':
					$spinner_html = grandprix_mikado_loading_spinner_atom();
					break;
				case 'clock':
					$spinner_html = grandprix_mikado_loading_spinner_clock();
					break;
				case 'mitosis':
					$spinner_html = grandprix_mikado_loading_spinner_mitosis();
					break;
				case 'lines':
					$spinner_html = grandprix_mikado_loading_spinner_lines();
					break;
				case 'fussion':
					$spinner_html = grandprix_mikado_loading_spinner_fussion();
					break;
				case 'wave_circles':
					$spinner_html = grandprix_mikado_loading_spinner_wave_circles();
					break;
				case 'pulse_circles':
					$spinner_html = grandprix_mikado_loading_spinner_pulse_circles();
					break;
				default:
					$spinner_html = grandprix_mikado_loading_spinner_pulse();
			}
		}
		
		print grandprix_mikado_get_module_part( $spinner_html );
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_grandprix' ) ) {
	function grandprix_mikado_loading_spinner_grandprix() {
		$html = '';
		$html .= '<div class="mkdf-grandprix-spinner">';
		$html .= '<div class="mkdf-grandprix-spinner-background"></div>';
		$html .= '<div class="mkdf-grandprix-spinner-text">';
		$html .= '<span class="mkdf-grandprix-spinner-logo"><svg x="0px" y="0px" viewBox="0 0 245 110" style="enable-background:new 0 0 245 110;" xml:space="preserve">
			<g class="mkdf-flag">
			<path d="M144.89,73.82l-17.57,0.06c0.34,0.35,0.77,0.67,1.32,0.98c8.88,4.98,17.56,10.28,26.45,15.25c2.25,1.26,2.69,2.57,1.82,5.22  c-1.56,4.71-2.67,9.51-4.05,14.57c12.31,0,24.28,0,36.47,0c3.31-11.97,6.55-23.7,9.96-36.03c-7.07,0.01-28.26,0.01-36.84,0.01  C159.45,73.88,145.61,73.82,144.89,73.82z"/>
			<path d="M70.92,73.76l-17.57,0.06c0.34,0.35,0.77,0.67,1.32,0.98c8.88,4.98,17.56,10.28,26.45,15.25c2.25,1.26,2.69,2.57,1.82,5.22  c-1.56,4.71-2.67,9.51-4.05,14.57c12.31,0,24.28,0,36.47,0c3.31-11.97,6.55-23.7,9.96-36.03c-7.07,0.01-28.26,0.01-36.84,0.01  C85.48,73.82,71.64,73.76,70.92,73.76z"/>
			<path d="M100.41,36.52c0.4,0.66,1.06,1.24,2,1.76c8.45,4.69,16.7,9.7,25.19,14.33c2.68,1.46,3.8,2.89,2.42,6.34  c-1.44,3.58-2.06,7.38-3.21,11.05c-0.55,1.75-0.42,2.93,0.51,3.89h35.13c3.48-12.72,6.79-24.8,10.23-37.38c-10.21,0-26.83,0-36.81,0  c-2.24,0-17.74-0.06-17.74-0.06L100.41,36.52z"/>
			<path d="M26.44,36.45c0.4,0.66,1.06,1.24,2,1.76c8.45,4.69,16.7,9.7,25.19,14.33c2.68,1.46,3.8,2.89,2.42,6.34  c-1.44,3.58-2.06,7.38-3.21,11.05c-0.55,1.75-0.42,2.93,0.51,3.89h35.13c3.48-12.72,6.79-24.8,10.23-37.38c-10.21,0-26.83,0-36.81,0  c-2.24,0-17.74-0.06-17.74-0.06L26.44,36.45z"/>
			<path d="M173.43,36.06c1.4-5.01,2.51-9.51,3.94-13.96c1.03-3.2,0.32-4.96-2.49-6.49c-8.68-4.75-17.12-9.87-25.4-15.53  c23.38,0,46.76,0,70.47,0c-3.15,11.31-6.21,22.49-9.5,33.64c-0.27,0.92-2.26,2.22-3.32,2.24C196.18,36.12,185.26,36.06,173.43,36.06  z"/>
			<path d="M103.52,21.27c-1.44,3.58-1.95,7.4-3.16,11.05c-0.59,1.78-0.61,3.11,0.05,4.2h35.46c3.41-12.43,6.69-24.39,9.99-36.45  c-23.99,0-47.34,0-71.93,0c9.86,5.69,18.64,10.81,27.49,15.82C103.54,17.09,104.75,18.21,103.52,21.27z"/>
			<path d="M29.55,21.2c-1.44,3.58-1.95,7.4-3.16,11.05c-0.59,1.78-0.61,3.11,0.05,4.2H61.9C65.3,24.02,68.58,12.06,71.88,0  C47.89,0,24.54,0-0.05,0c9.86,5.69,18.64,10.81,27.49,15.82C29.56,17.02,30.78,18.13,29.55,21.2z"/>
			</g>
			<polygon class="mkdf-separator-line" points="215.59,110 207.75,110 237.2,0.08 245.05,0.08 "/>
			</svg></span>';
		$html .= '<span class="mkdf-grandprix-spinner-text-inner">'. grandprix_mikado_get_meta_field_intersect( 'smooth_pt_spinner_text', grandprix_mikado_get_page_id() ) .'</span>';
		$html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_rotate_circles' ) ) {
	function grandprix_mikado_loading_spinner_rotate_circles() {
		$html = '';
		$html .= '<div class="mkdf-rotate-circles">';
		$html .= '<div></div>';
		$html .= '<div></div>';
		$html .= '<div></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_pulse' ) ) {
	function grandprix_mikado_loading_spinner_pulse() {
		$html = '<div class="pulse"></div>';
		
		return $html;
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_double_pulse' ) ) {
	function grandprix_mikado_loading_spinner_double_pulse() {
		$html = '';
		$html .= '<div class="double_pulse">';
		$html .= '<div class="double-bounce1"></div>';
		$html .= '<div class="double-bounce2"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_cube' ) ) {
	function grandprix_mikado_loading_spinner_cube() {
		$html = '<div class="cube"></div>';
		
		return $html;
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_rotating_cubes' ) ) {
	function grandprix_mikado_loading_spinner_rotating_cubes() {
		$html = '';
		$html .= '<div class="rotating_cubes">';
		$html .= '<div class="cube1"></div>';
		$html .= '<div class="cube2"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_stripes' ) ) {
	function grandprix_mikado_loading_spinner_stripes() {
		$html = '';
		$html .= '<div class="stripes">';
		$html .= '<div class="rect1"></div>';
		$html .= '<div class="rect2"></div>';
		$html .= '<div class="rect3"></div>';
		$html .= '<div class="rect4"></div>';
		$html .= '<div class="rect5"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_wave' ) ) {
	function grandprix_mikado_loading_spinner_wave() {
		$html = '';
		$html .= '<div class="wave">';
		$html .= '<div class="bounce1"></div>';
		$html .= '<div class="bounce2"></div>';
		$html .= '<div class="bounce3"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_two_rotating_circles' ) ) {
	function grandprix_mikado_loading_spinner_two_rotating_circles() {
		$html = '';
		$html .= '<div class="two_rotating_circles">';
		$html .= '<div class="dot1"></div>';
		$html .= '<div class="dot2"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_five_rotating_circles' ) ) {
	function grandprix_mikado_loading_spinner_five_rotating_circles() {
		$html = '';
		$html .= '<div class="five_rotating_circles">';
		$html .= '<div class="spinner-container container1">';
		$html .= '<div class="circle1"></div>';
		$html .= '<div class="circle2"></div>';
		$html .= '<div class="circle3"></div>';
		$html .= '<div class="circle4"></div>';
		$html .= '</div>';
		$html .= '<div class="spinner-container container2">';
		$html .= '<div class="circle1"></div>';
		$html .= '<div class="circle2"></div>';
		$html .= '<div class="circle3"></div>';
		$html .= '<div class="circle4"></div>';
		$html .= '</div>';
		$html .= '<div class="spinner-container container3">';
		$html .= '<div class="circle1"></div>';
		$html .= '<div class="circle2"></div>';
		$html .= '<div class="circle3"></div>';
		$html .= '<div class="circle4"></div>';
		$html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_atom' ) ) {
	function grandprix_mikado_loading_spinner_atom() {
		$html = '';
		$html .= '<div class="atom">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_clock' ) ) {
	function grandprix_mikado_loading_spinner_clock() {
		$html = '';
		$html .= '<div class="clock">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_mitosis' ) ) {
	function grandprix_mikado_loading_spinner_mitosis() {
		$html = '';
		$html .= '<div class="mitosis">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_lines' ) ) {
	function grandprix_mikado_loading_spinner_lines() {
		$html = '';
		$html .= '<div class="lines">';
		$html .= '<div class="line1"></div>';
		$html .= '<div class="line2"></div>';
		$html .= '<div class="line3"></div>';
		$html .= '<div class="line4"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_fussion' ) ) {
	function grandprix_mikado_loading_spinner_fussion() {
		$html = '';
		$html .= '<div class="fussion">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_wave_circles' ) ) {
	function grandprix_mikado_loading_spinner_wave_circles() {
		$html = '';
		$html .= '<div class="wave_circles">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';
		
		return $html;
	}
}

if ( ! function_exists( 'grandprix_mikado_loading_spinner_pulse_circles' ) ) {
	function grandprix_mikado_loading_spinner_pulse_circles() {
		$html = '';
		$html .= '<div class="pulse_circles">';
		$html .= '<div class="ball ball-1"></div>';
		$html .= '<div class="ball ball-2"></div>';
		$html .= '<div class="ball ball-3"></div>';
		$html .= '<div class="ball ball-4"></div>';
		$html .= '</div>';
		
		return $html;
	}
}
