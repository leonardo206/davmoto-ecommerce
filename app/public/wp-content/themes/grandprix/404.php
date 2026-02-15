<?php get_header(); ?>
				<div class="mkdf-page-not-found">
					<?php
					$mkdf_title_image_404 = grandprix_mikado_options()->getOptionValue( '404_page_title_image' );
					$mkdf_title_404       = grandprix_mikado_options()->getOptionValue( '404_title' );
					$mkdf_subtitle_404    = grandprix_mikado_options()->getOptionValue( '404_tagline' );
					$mkdf_text_404        = grandprix_mikado_options()->getOptionValue( '404_text' );
					$mkdf_button_label    = grandprix_mikado_options()->getOptionValue( '404_back_to_home' );
					$mkdf_button_style    = grandprix_mikado_options()->getOptionValue( '404_button_style' );
					?>
					
					<div class="mkdf-pnf-content-holder">
					<span class="mkdf-404-tagline">
						<?php if ( ! empty( $mkdf_subtitle_404 ) ) {
							echo esc_html( $mkdf_subtitle_404 );
						} else {
							esc_html_e( 'error page', 'grandprix' );
						} ?>
					</span>
					
					<h2 class="mkdf-404-title">
						<?php if ( ! empty( $mkdf_title_404 ) ) {
							echo esc_html( $mkdf_title_404 );
						} else {
							esc_html_e( 'PAGE NOT FOUND', 'grandprix' );
						} ?>
					</h2>
					
					<p class="mkdf-404-text">
						<?php if ( ! empty( $mkdf_text_404 ) ) {
							echo esc_html( $mkdf_text_404 );
						} else {
							esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'grandprix' );
						} ?>
					</p>
					
					<?php
						$button_params = array(
							'link' => esc_url( home_url( '/' ) ),
							'text' => ! empty( $mkdf_button_label ) ? $mkdf_button_label : esc_html__( 'Back to home', 'grandprix' )
						);
					
						if ( $mkdf_button_style == 'light-style' ) {
							$button_params['custom_class'] = 'mkdf-btn-light-style';
						}
						
						echo grandprix_mikado_return_button_html( $button_params );
					?>
					</div>
					<?php if ( ! empty( $mkdf_title_image_404 ) ) { ?>
					<div class="mkdf-404-title-image">
						<img src="<?php echo esc_url( $mkdf_title_image_404 ); ?>" alt="<?php esc_attr_e( '404 Title Image', 'grandprix' ); ?>" />
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php do_action( 'grandprix_mikado_action_before_closing_body_tag' ); ?>
<?php wp_footer(); ?>
</body>
</html>