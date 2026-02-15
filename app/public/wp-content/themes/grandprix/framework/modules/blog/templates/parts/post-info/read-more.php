<?php if ( ! grandprix_mikado_post_has_read_more() && ! post_password_required() ) { ?>
	<div class="mkdf-post-read-more-button">
		<?php
			$button_params = array(
				'type'         => 'simple-predefined',
				'link'         => get_the_permalink(),
				'text'         => esc_html__( 'Read More', 'grandprix' ),
				'custom_class' => 'mkdf-blog-list-button'
			);
			
			echo grandprix_mikado_return_button_html( $button_params );
		?>
	</div>
<?php } ?>