<div class="mkdf-item-showcase-specific-holder <?php echo esc_attr($holder_classes); ?>">
	<div class="mkdf-iss-content">
		<div class="mkdf-iss-info-section">
			<?php if (!empty($tagline)) { ?>
				<span class="mkdf-iss-tagline" <?php echo grandprix_mikado_get_inline_style($tagline_styles); ?>><?php echo esc_html($tagline); ?></span>
			<?php } ?>
			<?php if (!empty($title)) { ?>
				<<?php echo grandprix_mikado_core_escape_title_tag($title_tag); ?> class="mkdf-iss-title" <?php echo grandprix_mikado_get_inline_style($title_styles); ?>>
					<?php echo esc_html($title); ?>
				</<?php echo grandprix_mikado_core_escape_title_tag($title_tag); ?>>
			<?php } ?>
			<?php if (!empty($text)) { ?>
				<p class="mkdf-is-text" <?php echo grandprix_mikado_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
			<?php } ?>
			<?php if (!empty($button_link & $button_text)) { ?>
				<div class="mkdf-iss-button">
					<?php
					$button_params = array(
						'type'         => 'simple-predefined',
						'link'         => esc_url($button_link),
						'text'         => esc_html($button_text),
						'target'       => esc_attr($button_target)
					);
					echo grandprix_mikado_return_button_html( $button_params );
					?>
				</div>
			<?php } ?>
		<?php if(!empty($author_image || $author_tagline || $author_name)) { ?>
			<div class="mkdf-iss-author-section">
			<?php if ( ! empty( $author_image ) ) { ?>
				<div class="mkdf-iss-author-image">
					<?php echo wp_get_attachment_image( $author_image['image_id'], 'full' ); ?>
				</div>
			<?php } ?>
				<?php if ( ! empty( $author_tagline || $author_name ) ) { ?>
					<div class="mkdf-iss-author-info-holder">
					<?php if ( ! empty( $author_tagline ) ) { ?>
						<div class="mkdf-iss-author-tagline">
							<?php echo esc_html( $author_tagline ); ?>
						</div>
					<?php } ?>
					<?php if ( ! empty( $author_name ) ) { ?>
						<div class="mkdf-iss-author-name">
							<?php if ( ! empty( $author_link ) ) { ?>
								<a href="<?php echo esc_url( $author_link ); ?>" target="_self"><?php echo esc_html( $author_name ); ?></a>
							<?php } else {
								echo esc_html( $author_name );
							} ?>
						</div>
					<?php } ?>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
		</div>
		<div class="mkdf-iss-media-section">
			<div class="mkdf-iss-al-and-si-holder">
				<div class="mkdf-iss-additional-link-holder">
					<?php if(!empty($additional_link & $add_link_text)) { ?>
						<a class="mkdf-iss-additional-link" href="<?php echo esc_url($additional_link); ?>" target="<?php echo esc_attr($add_link_target); ?>"><?php echo esc_html($add_link_text); ?>
							<span class="ion-ios-play"></span>
						</a>
					<?php } ?>
				</div>
				<div class="mkdf-iss-second-image-holder">
					<?php if(!empty($second_image)) { ?>
						<div class="mkdf-iss-second-image" <?php echo grandprix_mikado_get_inline_style($second_image_styles);?>>
							<?php echo wp_get_attachment_image($second_image['image_id'], 'full'); ?>
							<span class="mkdf-angle one"></span>
							<span class="mkdf-angle two"></span>
							<span class="mkdf-angle three"></span>
							<span class="mkdf-angle four"></span>
						</div>
					<?php } ?>
				</div>
			</div>
			<div class="mkdf-iss-main-image-holder">
				<?php if(!empty($main_image)) {
					echo wp_get_attachment_image($main_image['image_id'], 'full', false,'style='. $main_image['style']);
				} ?>
			</div>
			<div class="mkdf-iss-icon-holder">
				<?php if(!empty($custom_icon)) {
					echo wp_get_attachment_image($custom_icon['image_id'], 'full');
				} ?>
			</div>
		</div>
	</div>
</div>