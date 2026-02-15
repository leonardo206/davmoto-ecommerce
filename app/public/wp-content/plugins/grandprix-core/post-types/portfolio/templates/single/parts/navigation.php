<?php if(grandprix_mikado_options()->getOptionValue('portfolio_single_hide_pagination') !== 'yes') : ?>
    <?php
    $back_to_link = get_post_meta(get_the_ID(), 'portfolio_single_back_to_link', true);
    $nav_same_category = grandprix_mikado_options()->getOptionValue('portfolio_single_nav_same_category') == 'yes';
	
	$next_text = esc_html__('next', 'grandprix-core');
    ?>
    <div class="mkdf-ps-navigation">
        <?php if(get_previous_post() !== '') : ?>
            <div class="mkdf-pag-prev">
                <?php if($nav_same_category) {
	                previous_post_link('%link','<span class="mkdf-nav-mark ion-ios-play"></span><span class="mkdf-nav-label">'.esc_html__('prev', 'grandprix-core') .'</span>', true, '', 'portfolio-category');
                } else {
	                previous_post_link('%link','<span class="mkdf-nav-mark ion-ios-play"></span><span class="mkdf-nav-label">'.esc_html__('prev', 'grandprix-core') .'</span>');
                } ?>
            </div>
        <?php endif; ?>

        <?php if($back_to_link !== '') : ?>
            <div class="mkdf-ps-back-btn">
                <a itemprop="url" href="<?php echo esc_url(get_permalink($back_to_link)); ?>">
                    <span class="mkdf-sa-circles">
						<span class="mkdf-sa-circles-row mkdf-sa-row-1">
							<span></span><span></span><span></span><span></span>
						</span>
						<span class="mkdf-sa-circles-row mkdf-sa-row-2">
							<span></span><span></span><span></span><span></span>
						</span>
	                    <span class="mkdf-sa-circles-row mkdf-sa-row-3">
							<span></span><span></span><span></span><span></span>
						</span>
                    </span>
                </a>
            </div>
        <?php endif; ?>

        <?php if(get_next_post() !== '') : ?>
            <div class="mkdf-pag-next">
                <?php if($nav_same_category) {
                    next_post_link('%link', '<span class="mkdf-nav-label">'.esc_html__('next', 'grandprix-core') .'</span><span class="mkdf-nav-mark ion-ios-play"></span>', true, '', 'portfolio-category');
                } else {
                    next_post_link('%link', '<span class="mkdf-nav-label">'.esc_html__('next', 'grandprix-core') .'</span><span class="mkdf-nav-mark ion-ios-play"></span>');
                } ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>