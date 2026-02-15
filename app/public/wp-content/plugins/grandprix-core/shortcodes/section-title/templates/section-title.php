<div class="mkdf-section-title-holder <?php echo esc_attr( $holder_classes ); ?>" <?php echo grandprix_mikado_get_inline_style( $holder_styles ); ?>>
	<div class="mkdf-st-inner">
	<?php if ( ! empty( $tagline ) ) { ?>
		<span class="mkdf-st-tagline" <?php echo grandprix_mikado_get_inline_style( $tagline_styles ); ?>>
			<?php echo wp_kses( $tagline, array( 'br' => true ) ); ?>
		</span>
	<?php } ?>
		<?php if ( ! empty( $title ) ) { ?>
			<<?php echo grandprix_mikado_core_escape_title_tag( $title_tag ); ?> class="mkdf-st-title" <?php echo grandprix_mikado_get_inline_style( $title_styles ); ?>>
				<?php if ( $type === 'split'  ) { ?>
					<span class="mkdf-sts-title-text"><?php echo wp_kses( $title, array( 'br' => true, 'span' => array( 'class' => true ) ) ); ?></span>
					<span class="mkdf-sts-separator" <?php echo grandprix_mikado_get_inline_style( $separator_styles ); ?>></span>
				<?php } else {?>
					<?php echo wp_kses( $title, array( 'br' => true, 'span' => array( 'class' => true ) ) ); ?>
				<?php } ?>
			</<?php echo grandprix_mikado_core_escape_title_tag( $title_tag ); ?>>
		<?php } ?>
		<?php if ( ! empty( $text ) ) { ?>
			<<?php echo grandprix_mikado_core_escape_title_tag( $text_tag ); ?> class="mkdf-st-text" <?php echo grandprix_mikado_get_inline_style( $text_styles ); ?>>
				<?php echo wp_kses( $text, array( 'br' => true ) ); ?>
			</<?php echo grandprix_mikado_core_escape_title_tag( $text_tag ); ?>>
		<?php } ?>
		<?php if ( ! empty( $button_parameters ) ) { ?>
			<div class="mkdf-st-button"><?php echo grandprix_mikado_get_button_html( $button_parameters ); ?></div>
		<?php } ?>
	</div>
</div>