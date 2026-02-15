<div class="mkdf-animated-text-holder <?php echo esc_attr( $holder_classes ); ?>">
	<<?php echo grandprix_mikado_core_escape_title_tag( $text_tag ); ?> class="mkdf-animated-text" <?php grandprix_mikado_inline_style( $text_styles ); ?> <?php echo grandprix_mikado_get_inline_attrs( $text_data ); ?> >
		<?php echo wp_kses_post( $text ); ?>
	</<?php echo grandprix_mikado_core_escape_title_tag( $text_tag ); ?>>
	<?php if (!empty( $params['text_overlay_image'] )){?>
		<div class="mkdf-animated-text-overlay" <?php grandprix_mikado_inline_style( $image_styles ); ?>></div>
	<?php }?>
</div>