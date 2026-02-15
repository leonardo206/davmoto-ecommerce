<button type="submit" <?php grandprix_mikado_inline_style($button_styles); ?> <?php grandprix_mikado_class_attribute($button_classes); ?> <?php echo grandprix_mikado_get_inline_attrs($button_data); ?> <?php echo grandprix_mikado_get_inline_attrs($button_custom_attrs); ?>>
    <?php if ( ($type == 'predefined') || ($type == 'simple-predefined') ){ ?>
	    <span class="mkdf-btn-predefined-line-holder">
            <span class="mkdf-btn-line-hidden"></span>
            <span class="mkdf-btn-text"><?php echo esc_html($text); ?></span>
	        <span class="mkdf-btn-line"></span>
            <i class="mkdf-icon-ion-icon ion-ios-play "></i>
        </span>
    <?php } else { ?>
        <span class="mkdf-btn-text"><?php echo esc_html($text); ?></span>
        <?php echo grandprix_mikado_icon_collections()->renderIcon($icon, $icon_pack); ?>
    <?php } ?>
</button>