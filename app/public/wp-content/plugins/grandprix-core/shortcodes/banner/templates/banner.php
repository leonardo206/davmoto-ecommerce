<div class="mkdf-banner-holder <?php echo esc_attr($holder_classes); ?>" <?php if(!empty($bg_color)) { ?> style="background-color:<?php echo esc_attr($bg_color); ?>" <?php } ?>>
	<?php if(!empty($image)) { ?>
	    <div class="mkdf-banner-image">
	        <?php echo wp_get_attachment_image($image, 'full'); ?>
	    </div>
	<?php } ?>
	<?php if(!empty($fg_image)) { ?>
		<div class="mkdf-banner-foreground-image">
			<?php echo wp_get_attachment_image($fg_image, 'full'); ?>
		</div>
	<?php } ?>
    <div class="mkdf-banner-text-holder" <?php echo grandprix_mikado_get_inline_style($overlay_styles); ?>>
	    <div class="mkdf-banner-text-outer">
		    <div class="mkdf-banner-text-inner">
		        <?php if(!empty($subtitle)) { ?>
		            <span class="mkdf-banner-subtitle">
			            <?php echo esc_html($subtitle); ?>
		            </span>
		        <?php } ?>
		        <?php if(!empty($title)) { ?>
		            <<?php echo grandprix_mikado_core_escape_title_tag($title_tag); ?> class="mkdf-banner-title" <?php echo grandprix_mikado_get_inline_style($title_styles); ?>>
		                <?php echo wp_kses($title, array('span' => array('class' => true))); ?>
	                </<?php echo grandprix_mikado_core_escape_title_tag($title_tag); ?>>
		        <?php } ?>
			    <?php if(!empty($custom_mark)) { ?>
				    <span class="mkdf-banner-custom-mark" <?php echo grandprix_mikado_get_inline_style($cm_styles); ?>>
						<?php echo wp_kses_post( grandprix_mikado_get_split_text($custom_mark) ); ?>
					</span>
			    <?php } ?>
				<?php if(!empty($link) && !empty($link_text)) {
					echo grandprix_mikado_get_button_html(array(
						'link'   => $link,
						'target' => $target,
						'text'   => $link_text,
						'type'   => 'simple-predefined',
						'size'   => 'medium'
					));
				} ?>
			</div>
		</div>
	</div>
	<?php if (!empty($link)) { ?>
        <a itemprop="url" class="mkdf-banner-link" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>"></a>
    <?php } ?>
</div>