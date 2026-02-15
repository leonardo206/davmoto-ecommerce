<div class="mkdf-is-item <?php echo esc_attr($showcase_item_class); ?>">
	<div class="mkdf-is-content">
		<?php if (!empty($item_title)) { ?>
			<<?php echo grandprix_mikado_core_escape_title_tag($item_title_tag); ?> class="mkdf-is-title" <?php echo grandprix_mikado_get_inline_style($item_title_styles); ?>>
				<?php if (!empty($item_link)) { ?><a href="<?php echo esc_url($item_link); ?>" target="<?php echo esc_attr($item_target); ?>"><?php } ?>
				<?php echo esc_html($item_title); ?>
				<?php if (!empty($item_link)) { ?></a><?php } ?>
			</<?php echo grandprix_mikado_core_escape_title_tag($item_title_tag); ?>>
		<?php } ?>
		<?php if (!empty($item_text)) { ?>
			<p class="mkdf-is-text" <?php echo grandprix_mikado_get_inline_style($item_text_styles); ?>><?php echo esc_html($item_text); ?></p>
		<?php } ?>
	</div>
	<?php if (!empty($item_mark)) { ?>
		<span class="mkdf-is-mark"><?php echo esc_html($item_mark); ?></span>
	<?php } ?>
</div>