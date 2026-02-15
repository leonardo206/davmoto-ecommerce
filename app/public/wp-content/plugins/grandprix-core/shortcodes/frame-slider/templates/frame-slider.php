<?php $i = 0; ?>
<div class="mkdf-frame-slider-holder">
    <div class="mkdf-fs-phone">
        <img src="<?php echo GRANDPRIX_CORE_SHORTCODES_URL_PATH ?>/frame-slider/assets/img/frame-slider.png" alt="<?php esc_attr_e( 'Frame slider phone', 'grandprix-core' ); ?>">
    </div>
    <div class="mkdf-fs-slides mkdf-owl-slider" <?php echo grandprix_mikado_get_inline_attrs( $slider_data ); ?>>
		<?php foreach ( $images as $image ) { ?>
            <div class="mkdf-fs-slide">
				<?php if ( ! empty( $links ) ){ ?>
                <a class="mkdf-ig-link" href="<?php echo esc_url( $links[ $i ++ ] ) ?>" title="<?php echo esc_attr( $image['alt'] ); ?>" target="<?php echo esc_attr( $target ); ?>">
					<?php } ?>
					<?php echo wp_get_attachment_image( $image['image_id'], 'full' ); ?>
					<?php if ( ! empty( $links ) ){ ?>
                </a>
			<?php } ?>
            </div>
		<?php } ?>
    </div>
</div>
