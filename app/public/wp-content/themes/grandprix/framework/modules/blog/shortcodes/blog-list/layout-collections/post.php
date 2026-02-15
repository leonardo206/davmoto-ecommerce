<?php
$custom_mark = get_post_meta(get_the_ID(), "mkdf_post_custom_mark_meta", true );
$split_custom_mark = grandprix_mikado_get_split_text($custom_mark);
?>

<li class="mkdf-bl-item mkdf-item-space">
	<div class="mkdf-bli-inner">
		<?php if ( $post_info_image == 'yes' ) {
			grandprix_mikado_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
		} ?>
        <div class="mkdf-bli-content">
            <?php if ($post_info_section == 'yes') { ?>
                <div class="mkdf-bli-info">
	                <?php
		                if ( $post_info_date == 'yes' ) {
			                grandprix_mikado_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
		                }
		                if ( $post_info_category == 'yes' ) {
			                grandprix_mikado_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
		                }
		                if ( $post_info_author == 'yes' ) {
			                grandprix_mikado_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
		                }
		                if ( $post_info_comments == 'yes' ) {
			                grandprix_mikado_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
		                }
		                if ( $post_info_like == 'yes' ) {
			                grandprix_mikado_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params );
		                }
	                ?>
                </div>
            <?php } ?>
	
	        <?php grandprix_mikado_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
	
	        <div class="mkdf-bli-excerpt">
		        <?php grandprix_mikado_get_module_template_part( 'templates/parts/excerpt', 'blog', '', $params ); ?>
		        <?php grandprix_mikado_get_module_template_part( 'templates/parts/post-info/read-more', 'blog', '', $params ); ?>
	        </div>
	        
	        <?php if($type === 'boxed' & $custom_mark !== '') { ?>
		        <span class="mkdf-post-custom-mark-on-hover">
	                <?php echo wp_kses_post( $split_custom_mark );?>
	            </span>
		        <span class="mkdf-post-custom-mark">
			        <?php echo esc_html($custom_mark);?>
	            </span>
	        <?php } ?>
	
	        <?php if($type === 'boxed') { ?>
		        <span class="mkdf-post-angle one"></span>
		        <span class="mkdf-post-angle two"></span>
		        <span class="mkdf-post-angle three"></span>
		        <span class="mkdf-post-angle four"></span>
	        <?php } ?>
        </div>
	</div>
</li>