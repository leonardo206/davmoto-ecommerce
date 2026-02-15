<?php
$blog_single_navigation = grandprix_mikado_options()->getOptionValue('blog_single_navigation') === 'no' ? false : true;
$blog_navigation_through_same_category = grandprix_mikado_options()->getOptionValue('blog_navigation_through_same_category') === 'no' ? false : true;
?>
<?php if($blog_single_navigation){ ?>
	<div class="mkdf-blog-single-navigation">
		<div class="mkdf-blog-single-navigation-inner clearfix">
			<?php
				/* Single navigation section - SETTING PARAMS */
				$post_navigation = array(
					/*'prev' => array(
						'mark' => '<span class="mkdf-single-button-content"><span class="mkdf-single-button-mark ion-ios-play"></span><span class="mkdf-single-button-placeholder">',
						'label' => '<span class="mkdf-single-button-label">'.esc_html__('prev', 'grandprix').'</span><span class="mkdf-single-button-line"></span></span><span class="mkdf-single-button-line-hidden mkdf-animate"></span><span class="mkdf-single-button-label mkdf-animate">'.esc_html__('prev', 'grandprix').'</span><span class="mkdf-single-button-line mkdf-animate"></span></span>'
					),
					'next' => array(
						'mark' => '<span class="mkdf-single-button-content"><span class="mkdf-single-button-mark ion-ios-play"></span><span class="mkdf-single-button-placeholder">',
						'label' => '<span class="mkdf-single-button-label">'.esc_html__('next', 'grandprix').'</span><span class="mkdf-single-button-line"></span></span><span class="mkdf-single-button-line-hidden mkdf-animate"></span><span class="mkdf-single-button-label mkdf-animate">'.esc_html__('next', 'grandprix').'</span><span class="mkdf-single-button-line mkdf-animate"></span></span>'
					)*/
					'prev' => array(
						'mark' => '<span class="mkdf-single-button-content"><span class="mkdf-single-button-mark ion-ios-play"></span>',
						'label' => '<span class="mkdf-single-button-label">'.esc_html__('prev', 'grandprix').'</span></span>'
					),
					'next' => array(
						'mark' => '<span class="mkdf-single-button-content"><span class="mkdf-single-button-mark ion-ios-play"></span>',
						'label' => '<span class="mkdf-single-button-label">'.esc_html__('next', 'grandprix').'</span></span>'
					)
				);
			
				if($blog_navigation_through_same_category){
					if(get_previous_post(true) !== ""){
						$post_navigation['prev']['post'] = get_previous_post(true);
					}
					if(get_next_post(true) !== ""){
						$post_navigation['next']['post'] = get_next_post(true);
					}
				} else {
					if(get_previous_post() !== ""){
						$post_navigation['prev']['post'] = get_previous_post();
					}
					if(get_next_post() !== ""){
						$post_navigation['next']['post'] = get_next_post();
					}
				}

				/* Single navigation section - RENDERING */
				foreach (array('prev', 'next') as $nav_type) {
					if (isset($post_navigation[$nav_type]['post'])) { ?>
						<a itemprop="url" class="mkdf-single-button <?php echo esc_attr($nav_type); ?>" href="<?php echo get_permalink($post_navigation[$nav_type]['post']->ID); ?>">
							<?php echo wp_kses($post_navigation[$nav_type]['mark'], array('span' => array('class' => true))); ?>
							<?php echo wp_kses($post_navigation[$nav_type]['label'], array('span' => array('class' => true))); ?>
						</a>
					<?php }
				}
			?>
		</div>
	</div>
<?php } ?>