<?php
$thumb_size = $this_object->getImageSize($params);
?>
<div class="mkdf-pli-image">
	<?php if ( has_post_thumbnail() ) {
		$image_src = get_the_post_thumbnail_url( get_the_ID() );
		
		if ( $thumb_size !== 'custom' ) {
			if ( strpos( $image_src, '.gif' ) !== false ) {
				echo get_the_post_thumbnail( get_the_ID(), 'full' );
			} else {
				echo get_the_post_thumbnail( get_the_ID(), $thumb_size );
			}
		} elseif ( isset( $custom_image_width ) && ! empty( $custom_image_width ) && isset( $custom_image_height ) && ! empty( $custom_image_height ) ) {
			echo grandprix_mikado_generate_thumbnail( get_post_thumbnail_id( get_the_ID() ), null, intval( $custom_image_width ), intval( $custom_image_height ) );
		}
		
	} else { ?>
		<img itemprop="image" class="mkdf-pl-original-image" width="800" height="600" src="<?php echo GRANDPRIX_CORE_CPT_URL_PATH.'/portfolio/assets/img/portfolio_featured_image.jpg'; ?>" alt="<?php esc_attr_e('Portfolio Featured Image', 'grandprix-core'); ?>" />
	<?php } ?>
</div>