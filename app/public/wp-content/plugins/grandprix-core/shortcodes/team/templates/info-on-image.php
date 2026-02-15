<div class="mkdf-team-holder <?php echo esc_attr($holder_classes); ?>">
	<div class="mkdf-team-inner">
		<?php if ($team_image !== '') { ?>
			<div class="mkdf-team-image">
                <?php echo wp_get_attachment_image($team_image, 'full'); ?>
				<div class="mkdf-team-social-wrapper">
					<div class="mkdf-team-social-outer">
						<div class="mkdf-team-social-inner">
							<?php if ($team_position !== "") { ?>
								<h6 class="mkdf-team-position" <?php echo grandprix_mikado_get_inline_style($team_position_styles); ?>><?php echo esc_html($team_position); ?></h6>
							<?php } ?>
							<?php if ($team_name !== '') { ?>
								<<?php echo grandprix_mikado_core_escape_title_tag($team_name_tag); ?> class="mkdf-team-name" <?php echo grandprix_mikado_get_inline_style($team_name_styles); ?>><?php echo esc_html($team_name); ?></<?php echo grandprix_mikado_core_escape_title_tag($team_name_tag); ?>>
							<?php } ?>
							<?php if ($team_text !== "") { ?>
								<p class="mkdf-team-text" <?php echo grandprix_mikado_get_inline_style($team_text_styles); ?>><?php echo esc_html($team_text); ?></p>
							<?php } ?>
                            <?php if ($team_link !== '') { ?>
                                <a class="mkdf-team-link" href="<?php echo esc_url($team_link) ?>" target="<?php echo esc_attr($team_target) ?>" ></a>
                            <?php } ?>
							<?php if (!empty($team_social_icons)) { ?>
								<div class="mkdf-team-social-holder">
									<?php foreach( $team_social_icons as $team_social_icon ) { ?>
										<span class="mkdf-team-icon"><?php echo wp_kses_post($team_social_icon); ?></span>
									<?php } ?>
								</div>
							<?php } ?>
							<?php if ($textual_social_icons !== 'no') { ?>
								<div class="mkdf-team-textual-social-holder">
									<?php if(!empty($textual_social_1 & $textual_social_link_1)) { ?>
										<a class="mkdf-team-icon" href="<?php echo esc_url($textual_social_link_1); ?>" <?php if($textual_social_link_target_1 !== '') { ?> target="<?php echo esc_attr($textual_social_link_target_1); }?>"><?php echo esc_html($textual_social_1); ?></a>
									<?php } ?>
									<?php if(!empty($textual_social_2 & $textual_social_link_2)) { ?>
										<a class="mkdf-team-icon" href="<?php echo esc_url($textual_social_link_2); ?>" <?php if($textual_social_link_target_2 !== '') { ?> target="<?php echo esc_attr($textual_social_link_target_2); }?>"><?php echo esc_html($textual_social_2); ?></a>
									<?php } ?>
									<?php if(!empty($textual_social_3 & $textual_social_link_3)) { ?>
										<a class="mkdf-team-icon" href="<?php echo esc_url($textual_social_link_3); ?>" <?php if($textual_social_link_target_3 !== '') { ?> target="<?php echo esc_attr($textual_social_link_target_3); }?>"><?php echo esc_html($textual_social_3); ?></a>
									<?php } ?>
									<?php if(!empty($textual_social_4 & $textual_social_link_4)) { ?>
										<a class="mkdf-team-icon" href="<?php echo esc_url($textual_social_link_4); ?>" <?php if($textual_social_link_target_4 !== '') { ?> target="<?php echo esc_attr($textual_social_link_target_4); }?>"><?php echo esc_html($textual_social_4); ?></a>
									<?php } ?>
									<?php if(!empty($textual_social_5 & $textual_social_link_5)) { ?>
										<a class="mkdf-team-icon" href="<?php echo esc_url($textual_social_link_5); ?>" <?php if($textual_social_link_target_5 !== '') { ?> target="<?php echo esc_attr($textual_social_link_target_5); }?>"><?php echo esc_html($textual_social_5); ?></a>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

		<?php } ?>
	</div>
</div>