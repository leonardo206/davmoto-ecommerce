<?php if ( $max_num_pages > 1 ) { ?>
	<div class="mkdf-blog-pag-loading">
		<div class="mkdf-blog-pag-bounce1"></div>
		<div class="mkdf-blog-pag-bounce2"></div>
		<div class="mkdf-blog-pag-bounce3"></div>
	</div>
	<?php
	$number_of_pages = $max_num_pages;
	$current_page    = $paged;
	
	if ( $number_of_pages > 1 ) { ?>
		<div class="mkdf-bl-standard-pagination">
			<ul>
				<li class="mkdf-pag-prev">
					<a href="#" data-paged="1">
						<span class="mkdf-nav-mark ion-ios-play"></span>
						<span class="mkdf-nav-label"><?php echo esc_html__('prev', 'grandprix'); ?></span>
					</a>
				</li>
				<li class="mkdf-pag-next">
					<a href="#" data-paged="2">
						<span class="mkdf-nav-label"><?php echo esc_html__('next', 'grandprix'); ?></span>
						<span class="mkdf-nav-mark ion-ios-play"></span>
					</a>
				</li>
			</ul>
		</div>
	<?php }
	
	$unique_id = rand( 1000, 9999 );
	wp_nonce_field( 'mkdf_blog_load_more_nonce_' . $unique_id, 'mkdf_blog_load_more_nonce_' . $unique_id );
} ?>
