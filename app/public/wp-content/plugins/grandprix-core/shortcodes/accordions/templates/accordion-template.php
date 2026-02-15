<<?php echo grandprix_mikado_core_escape_title_tag($title_tag); ?> class="mkdf-accordion-title">
    <span class="mkdf-accordion-mark">
		<span class="mkdf_icon_plus icon_plus"></span>
		<span class="mkdf_icon_minus icon_minus-06"></span>
	</span>
	<span class="mkdf-tab-title"><?php echo esc_html($title); ?></span>
</<?php echo grandprix_mikado_core_escape_title_tag($title_tag); ?>>
<div class="mkdf-accordion-content">
	<div class="mkdf-accordion-content-inner">
		<?php echo do_shortcode($content); ?>
	</div>
</div>