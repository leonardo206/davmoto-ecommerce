<div class="mkdf-image-with-text-holder <?php echo esc_attr($holder_classes); ?>">
    <div class="mkdf-iwt-image">
	    <?php if ($image_behavior === 'scrolling-image') { ?>
	        <div class="mkdf-iwt-image-holder">
		        <div class="mkdf-iwt-image-holder-inner">
	    <?php } ?>
        <?php if ($image_behavior === 'lightbox') { ?>
            <a itemprop="image" href="<?php echo esc_url($image['url']); ?>" data-rel="prettyPhoto[iwt_pretty_photo]" title="<?php echo esc_attr($image['alt']); ?>">
        <?php } else if ($image_behavior === 'custom-link' || $image_behavior === 'scrolling-image' && !empty($custom_link)) {?>
	            <a itemprop="url" href="<?php echo esc_url($custom_link); ?>" target="<?php echo esc_attr($custom_link_target); ?>">
        <?php } ?>
            <?php if(is_array($image_size) && count($image_size)) : ?>
                <?php echo grandprix_mikado_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
            <?php else: ?>
	        <?php echo wp_get_attachment_image($image['image_id'], $image_size, false, array('class' => 'main-image') ); ?>
            <?php endif; ?>
        <?php if ($image_behavior === 'lightbox' || $image_behavior === 'custom-link' || $image_behavior === 'scrolling-image' && !empty($custom_link)) { ?>
            </a>
        <?php } ?>
        <?php if ($image_behavior === 'scrolling-image') { ?>
		        </div>
		        <img class="mkdf-iwt-frame" src="<?php echo GRANDPRIX_MIKADO_ROOT ?>/assets/img/scrolling-image-frame.png" alt="<?php esc_html_e('Scrolling Image Frame', 'grandprix-core') ?>" />
	        </div>
        <?php } ?>
    </div>
    <div class="mkdf-iwt-text-holder">
        <?php if(!empty($tagline)) { ?>
            <span class="mkdf-iwt-tagline" <?php echo grandprix_mikado_get_inline_style($tagline_styles); ?>><?php echo esc_html($tagline); ?></span>
        <?php } ?>
	    <?php if(!empty($title)) { ?>
		    <?php if (!empty($custom_link)) { ?>
		        <a itemprop="url" href="<?php echo esc_url($custom_link); ?>" target="<?php echo esc_attr($custom_link_target); ?>">
			        <<?php echo grandprix_mikado_core_escape_title_tag($title_tag); ?> class="mkdf-iwt-title" <?php echo grandprix_mikado_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo grandprix_mikado_core_escape_title_tag($title_tag); ?>>
			    </a>
		    <?php } else {?>
	    <<?php echo grandprix_mikado_core_escape_title_tag($title_tag); ?> class="mkdf-iwt-title" <?php echo grandprix_mikado_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo grandprix_mikado_core_escape_title_tag($title_tag); ?>>
		    <?php } ?>
	    <?php } ?>
		<?php if(!empty($text)) { ?>
            <p class="mkdf-iwt-text" <?php echo grandprix_mikado_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
        <?php } ?>
    </div>
</div>