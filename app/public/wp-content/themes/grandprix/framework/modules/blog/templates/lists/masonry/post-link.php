<?php
$post_classes[] = 'mkdf-item-space';
$custom_mark = get_post_meta(get_the_ID(), "mkdf_post_custom_mark_meta", true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-text">
            <div class="mkdf-post-text-inner">
                <div class="mkdf-post-text-main">
	                <div class="mkdf-post-mark"><?php echo grandprix_mikado_return_svg_link_icon();?></div>
                    <?php grandprix_mikado_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
	                <?php if($custom_mark != '') { ?>
		                <span class="mkdf-post-custom-mark">
			                <?php echo esc_html($custom_mark); ?>
			            </span>
	                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</article>