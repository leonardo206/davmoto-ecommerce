<div class="mkdf-preview-slider" <?php echo grandprix_mikado_get_inline_attrs($slider_data); ?>>
	<div class="mkdf-ps-text-holder">
		<div class="mkdf-ps-tagline"><?php echo esc_html($tagline); ?></div>
		<h1 class="mkdf-ps-title"><?php echo esc_html($title); ?></h1>
	</div>
	<div class="mkdf-ps-images-holder">
		<div class="mkdf-ps-images-holder-inner">
			<div class="mkdf-ps-laptop-holder">
				<img src="<?php echo GRANDPRIX_CORE_ASSETS_URL_PATH .'/img/laptop.png' ?>" class="mkdf-ps-laptop-frame" alt="<?php esc_attr_e('laptop','grandprix-core');?>"/>
				<div class="mkdf-ps-laptop-slider">
					<div class="mkdf-ps-laptop-images mkdf-preview-slider-element">
						<?php
						$i = 0;
						foreach($laptop_images as $laptop_image){ ?>
							<div class="mkdf-ps-laptop-image"><?php echo wp_get_attachment_image($laptop_image,'full'); ?></div>
						<?php $i++; } ?>
					</div>
				</div>
			</div>
			<div class="mkdf-ps-tablet-holder">
				<img src="<?php echo GRANDPRIX_CORE_ASSETS_URL_PATH .'/img/tablet.png' ?>" class="mkdf-ps-tablet-frame"  alt="<?php esc_attr_e('tablet','grandprix-core');?>"/>
				<div class="mkdf-ps-tablet-slider">
						<div class="mkdf-ps-tablet-images  mkdf-preview-slider-element">
							<?php
							$j = 0;
							foreach($tablet_images as $tablet_image){ ?>
								<?php echo wp_get_attachment_image($tablet_image,'full'); ?>
							<?php $j++; } ?>
						</div>
				</div>
			</div>
			<div class="mkdf-ps-mobile-holder">
				<img src="<?php echo GRANDPRIX_CORE_ASSETS_URL_PATH .'/img/phone.png' ?>" class="mkdf-ps-phone-frame"  alt="<?php esc_attr_e('phone','grandprix-core');?>"/>
				<div class="mkdf-ps-mobile-slider">
					<div class="mkdf-ps-mobile-images  mkdf-preview-slider-element">
						<?php
						$k = 0;
						foreach($mobile_images as $mobile_image){ ?>
							<?php echo wp_get_attachment_image($mobile_image,'full'); ?>
						<?php $k++; } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mkdf-ps-dots-holder">
		<div class="mkdf-ps-additional-text"><?php echo esc_html__('Choose Your','grandprix-core');?></div>
		<div class="mkdf-ps-dots-holder-inner mkdf-preview-slider" <?php echo grandprix_mikado_get_inline_attrs($slider_data); ?>>
			<?php
			$k = 0;
			foreach($pagination_colors as $pagination_color){ ?>
				<div class="mkdf-ps-dot" style="background-color: <?php echo esc_attr($pagination_colors[$k]); ?>"></div>
			<?php $k++; } ?>
		</div>
		<div class="mkdf-ps-additional-text"><?php echo esc_html__('Color Style','grandprix-core' );?></div>
	</div>
	<div class="mkdf-background-holder"></div>
</div>