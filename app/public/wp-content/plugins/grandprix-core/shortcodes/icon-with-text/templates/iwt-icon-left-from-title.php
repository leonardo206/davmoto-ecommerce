<div <?php grandprix_mikado_class_attribute($holder_classes); ?>>
	<div class="mkdf-iwt-iat-holder" <?php grandprix_mikado_inline_style($content_styles); ?>>
	<?php if($icon_animation_holder) {?>
	<div class="mkdf-iwt-icon mkdf-icon-animated" <?php grandprix_mikado_inline_style($icon_animation_holder_styles); ?>>
		<?php } else { ?>
		<div class="mkdf-iwt-icon">
			<?php } ?>
			<?php if(!empty($link)) : ?>
			<a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>" <?php grandprix_mikado_inline_style($custom_icon_styles);?>>
				<?php endif; ?>
				<?php if(!empty($enable_custom_icon)) : ?>
					<?php echo wp_get_attachment_image($custom_image_icon, 'full');
					
					$params['custom_svg_icon'] = urldecode(base64_decode($params['custom_svg_icon']));
					
					echo grandprix_mikado_get_module_part($params['custom_svg_icon'] );?>
				
				<?php else: ?>
					<?php echo grandprix_core_get_shortcode_module_template_part('templates/icon', 'icon-with-text', '', array('icon_parameters' => $icon_parameters)); ?>
				<?php endif; ?>
				<?php if(!empty($link)) : ?>
			</a>
		<?php endif; ?>
		</div>
			<?php if(!empty($title)) { ?>
			<<?php echo grandprix_mikado_core_escape_title_tag($title_tag); ?> class="mkdf-iwt-title" <?php grandprix_mikado_inline_style($title_styles); ?>>
			<?php if(!empty($link)) : ?>
			<a itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
				<?php endif; ?>
				<span class="mkdf-iwt-title-text"><?php echo esc_html($title); ?></span>
				<?php if(!empty($link)) : ?>
			</a>
		<?php endif; ?>
		</<?php echo grandprix_mikado_core_escape_title_tag($title_tag); ?>>
	<?php } ?>
	</div>
	<?php if(!empty($text)) { ?>
		<p class="mkdf-iwt-text" <?php grandprix_mikado_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
	<?php } ?>
</div>
