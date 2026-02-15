<?php
$rand = rand(0, 1000);
?>
<div class="mkdf-video-button-holder <?php echo esc_attr($holder_classes); ?>">
	<?php if(!empty($video_image)) {?>
		<div class="mkdf-video-button-image">
			<?php echo wp_get_attachment_image($video_image, 'full'); ?>
		</div>
	<?php } ?>
	<?php if(!empty($play_button_image)) { ?>
		<span class="mkdf-video-button-play-image">
					<span class="mkdf-video-button-play-inner <?php echo esc_attr($inner_classes); ?>">
						<span class="mkdf-video-button-play-image-holder">
							<?php echo wp_get_attachment_image($play_button_image, 'full'); ?>
							<?php if(!empty($play_button_hover_image)) { ?>
								<?php echo wp_get_attachment_image($play_button_hover_image, 'full'); ?>
							<?php } ?>
							<?php if(!empty($video_link)) {?>
								<a class="mkdf-video-button-link" href="<?php echo esc_url($video_link); ?>" data-rel="prettyPhoto[video_button_pretty_photo_<?php echo esc_attr($rand); ?>]"></a>
							<?php } ?>
						</span>
					</span>
				</span>
		</span>
	<?php } else { ?>
		<span class="mkdf-video-button-play" <?php echo grandprix_mikado_get_inline_style($play_button_styles); ?>>
			<span class="mkdf-video-button-play-inner">
				<span class="mkdf-video-button-play-holder">
					<span class="mkdf-video-button-play-text">
			            <span class="mkdf-btn-line-hidden"></span>
			            <span class="mkdf-btn-text"><?php esc_html_e('Play', 'grandprix-core'); ?></span>
				        <span class="mkdf-btn-line"></span>
			            <i class="mkdf-icon-ion-icon ion-ios-play "></i>
			        </span>
			        <span class="mkdf-video-button-svg">
						<svg x="0px" y="0px" width="78px" height="80px" viewBox="0 0 78 80" style="enable-background:new 0 0 78 80;">
							<path fill="CurrentColor" d="M38.2,0C20.1,0,4.8,12.3,0,29h1C5.8,12.8,20.7,1,38.2,1C59.6,1,77,18.5,77,40c0,21.5-17.4,39-38.8,39
		C21,79,6.4,67.6,1.3,52H0.3c5.1,16.2,20.1,28,37.9,28C60.2,80,78,62.1,78,40C78,17.9,60.2,0,38.2,0z"></path>
						</svg>
					</span>
					<?php if(!empty($video_link)) {?>
						<a class="mkdf-video-button-link" href="<?php echo esc_url($video_link); ?>" data-rel="prettyPhoto[video_button_pretty_photo_<?php echo esc_attr($rand); ?>]"></a>
					<?php } ?>
				</span>
			</span>
		</span>
	<?php } ?>
	<?php if ( ! empty( $tagline || $title ) ) { ?>
		<div class="mkdf-video-button-outer <?php echo esc_attr($outer_classes); ?>">
			<div class="mkdf-video-button-inner <?php echo esc_attr($inner_classes); ?>">
				<div class="mkdf-vb-tat-holder">
					<?php if ( ! empty( $tagline ) ) { ?>
						<span class="mkdf-vb-tagline" <?php echo grandprix_mikado_get_inline_style( $tagline_styles ); ?>>
							<?php echo wp_kses( $tagline, array( 'br' => true ) ); ?>
						</span>
					<?php } ?>
					<?php if ( ! empty( $title ) ) { ?>
						<<?php echo grandprix_mikado_core_escape_title_tag( $title_tag ); ?> class="mkdf-vb-title" <?php echo grandprix_mikado_get_inline_style( $title_styles ); ?>>
						<?php echo wp_kses( $title, array( 'br' => true, 'span' => array( 'class' => true ) ) ); ?>
					</<?php echo grandprix_mikado_core_escape_title_tag( $title_tag ); ?>>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>
</div>