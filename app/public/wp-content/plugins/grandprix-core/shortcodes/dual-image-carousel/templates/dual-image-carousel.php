<div <?php echo grandprix_mikado_get_class_attribute($dualImagesCarouselClasses); ?> <?php echo grandprix_mikado_get_inline_attrs($data_params); ?> >
    <div class="swiper-wrapper">
        <?php foreach ($dual_image_carousel as $object) : ?>
            <div class="swiper-slide" data-swiper-title='<?php if (!empty($object['title'])){ echo esc_attr( $object['title']);} ?>'>
                <?php if (!empty($object['background_image'])) { ?>
                    <div class="mkdf-slide-background-image-holder">
                        <div class="mkdf-slide-background-image">
                            <?php echo wp_get_attachment_image($object['background_image'], 'full'); ?>
	                        <div class="mkdf-slide-info-holder">
		                        <?php if (!empty($object["custom_mark"])) { ?>
		                            <span class="mkdf-slide-custom-mark"><?php echo wp_kses_post( grandprix_mikado_get_split_text($object["custom_mark"]) ); ?></span>
		                        <?php } ?>
		                        <div class="mkdf-slide-info">
			                        <?php if (!empty($object["tagline"])) { ?>
			                            <div class="mkdf-slide-tagline">
				                            <span><?php echo esc_html($object['tagline']); ?></span>
			                            </div>
			                        <?php } ?>
		                            <h4 class="mkdf-slide-title">
			                            <a href="<?php echo esc_url($object['link']); ?>" target="<?php echo esc_attr($object["target"]); ?>">
				                            <?php if (!empty($object['title'])) { ?>
			                                    <?php echo esc_html($object['title']); ?>
				                            <?php } ?>
			                            </a>
		                            </h4>
			                        <?php if(!empty($object['link']) && !empty($object['link_text'])) {
				                        echo grandprix_mikado_get_button_html(array(
					                        'link'   => $object['link'],
					                        'target' => $object["target"],
					                        'text'   => $object['link_text'],
					                        'type'   => 'simple-predefined',
					                        'size'   => 'medium'
				                        ));
			                        } ?>
		                        </div>
	                        </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (!empty($object['foreground_image'])) { ?>
                    <div class="mkdf-slide-foreground-image-holder">
		                <div class="mkdf-slide-foreground-image" data-swiper-parallax="-50%">
			                <?php echo wp_get_attachment_image($object['foreground_image'], 'full'); ?>
		                </div>
	                </div>
                <?php } ?>
            </div>
        <?php endforeach; ?>
    </div>
	<div class="mkdf-custom-pagination">
		<div class="swiper-pagination"></div>
		<div class="mkdf-pagination-line-holder">
			<span class="mkdf-pagination-line"></span>
		</div>
	</div>
</div>