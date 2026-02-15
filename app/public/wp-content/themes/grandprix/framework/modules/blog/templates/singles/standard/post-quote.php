<?php
$custom_mark = get_post_meta(get_the_ID(), "mkdf_post_custom_mark_meta", true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-text">
            <div class="mkdf-post-text-inner">
                <div class="mkdf-post-text-main">
                    <div class="mkdf-post-mark">
                        <span class="mkdf-quote-mark"></span>
                    </div>
                    <?php grandprix_mikado_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
                </div>
            </div>
	        <?php if($custom_mark != '') { ?>
		        <span class="mkdf-post-custom-mark">
                <?php echo esc_html($custom_mark); ?>
            </span>
	        <?php } ?>
        </div>
    </div>
	<div class="mkdf-post-info-top">
		<?php grandprix_mikado_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
		<?php grandprix_mikado_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
	</div>
    <div class="mkdf-post-additional-content">
        <?php the_content(); ?>
    </div>
	<div class="mkdf-post-info-bottom clearfix">
		<div class="mkdf-post-info-bottom-left">
			<?php if(grandprix_mikado_options()->getOptionValue('show_alc_blog_single') === 'yes') {
				grandprix_mikado_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $part_params );
			} ?>
			<?php grandprix_mikado_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
		</div>
		<div class="mkdf-post-info-bottom-right">
			<?php if(grandprix_mikado_options()->getOptionValue('show_alc_blog_single') === 'yes') {
				grandprix_mikado_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $part_params );
				grandprix_mikado_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $part_params );
			} ?>
			<?php grandprix_mikado_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
		</div>
	</div>
</article>