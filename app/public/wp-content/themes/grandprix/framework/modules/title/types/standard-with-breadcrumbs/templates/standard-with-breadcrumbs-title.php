<?php do_action('grandprix_mikado_action_before_page_title'); ?>

<div class="mkdf-title-holder <?php echo esc_attr($holder_classes); ?>" <?php grandprix_mikado_inline_style($holder_styles); ?> <?php echo grandprix_mikado_get_inline_attrs($holder_data); ?>>
	<?php if(!empty($title_image)) { ?>
		<div class="mkdf-title-image">
			<img itemprop="image" src="<?php echo esc_url($title_image['src']); ?>" alt="<?php echo esc_attr($title_image['alt']); ?>" />
		</div>
	<?php } ?>
	<div class="mkdf-title-wrapper" <?php grandprix_mikado_inline_style($wrapper_styles); ?>>
		<div class="mkdf-title-inner">
			<div class="mkdf-grid">
				<div class="mkdf-title-info">
					<?php if(!empty($subtitle)){ ?>
						<<?php echo grandprix_mikado_escape_title_tag($subtitle_tag); ?> class="mkdf-page-subtitle" <?php grandprix_mikado_inline_style($subtitle_styles); ?>><?php echo esc_html($subtitle); ?></<?php echo grandprix_mikado_escape_title_tag($subtitle_tag); ?>>
					<?php } ?>
					<?php if(!empty($title)) { ?>
						<<?php echo grandprix_mikado_escape_title_tag($title_tag); ?> class="mkdf-page-title entry-title" <?php grandprix_mikado_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo grandprix_mikado_escape_title_tag($title_tag); ?>>
					<?php } ?>
				</div>
				<div class="mkdf-breadcrumbs-info">
					<?php grandprix_mikado_custom_breadcrumbs(); ?>
				</div>
			</div>
	    </div>
	</div>
</div>

<?php do_action('grandprix_mikado_action_after_page_title'); ?>
