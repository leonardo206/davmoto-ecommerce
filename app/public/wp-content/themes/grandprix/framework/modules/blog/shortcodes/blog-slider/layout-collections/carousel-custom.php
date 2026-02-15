<?php
$custom_mark = get_post_meta(get_the_ID(), "mkdf_post_custom_mark_meta", true );
?>

<li class="mkdf-blog-slider-item">
    <div class="mkdf-blog-slider-item-inner">
        <div class="mkdf-item-image">
	        <?php if($custom_mark !== '') {?>
		        <span class="mkdf-post-custom-mark">
	                <?php echo esc_html($custom_mark); ?>
	            </span>
	        <?php } ?>
	            <?php grandprix_mikado_get_module_template_part( 'templates/parts/image', 'blog', '', $params ); ?>
        </div>
        <div class="mkdf-item-text-wrapper">
            <div class="mkdf-item-text-holder">
                <div class="mkdf-item-text-holder-inner">
	                <?php if($post_info_date == 'yes' || $post_info_category == 'yes' || $post_info_author == 'yes' || $post_info_comments == 'yes'){ ?>
		                <div class="mkdf-item-info-section">
			                <?php
			                if ($post_info_date == 'yes') {
				                grandprix_mikado_get_module_template_part('templates/parts/post-info/date', 'blog', '', $params);
			                }
			                if ($post_info_category == 'yes') {
				                grandprix_mikado_get_module_template_part('templates/parts/post-info/category', 'blog', '', $params);
			                }
			                if ($post_info_author == 'yes') {
				                grandprix_mikado_get_module_template_part('templates/parts/post-info/author', 'blog', '', $params);
			                }
			                if ($post_info_comments == 'yes') {
				                grandprix_mikado_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $params);
			                }
			                ?>
		                </div>
	                <?php } ?>
	
	                <?php grandprix_mikado_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>

                    <?php grandprix_mikado_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $params); ?>
                </div>
            </div>
        </div>
    </div>
</li>