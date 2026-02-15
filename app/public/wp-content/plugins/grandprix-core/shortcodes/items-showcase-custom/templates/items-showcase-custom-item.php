<div class="mkdf-items-showcase-custom-holder <?php echo esc_attr( $holder_classes ); ?>">
	<div class="mkdf-issc-content">
		<div class="mkdf-issc-info-section">
			<?php $j = 0; ?>
			<?php foreach ( $items_showcase_custom as $object ) : ?>
				<div class="mkdf-issc-main-image-holder" data-index="<?php echo esc_attr( $j++ ); ?>">
					<div class="mkdf-issc-image">
						<?php if ( ! empty( $object['image'] ) ) { ?>
							<?php echo wp_get_attachment_image( $object['image'], 'full' );
						} ?>
						<?php for ( $i = 1; $i <= 3; $i ++ ) { ?>
							<?php if ( ! empty( $object[ 'info_title_' . $i ] ) ) { ?>
								<div class="mkdf-issc-icon"> <?php echo grandprix_mikado_return_svg_plus(); ?>
									<div class="mkdf-icon-info-holder">
										<div class="mkdf-icon-info">
											<h4><?php echo esc_html( $object[ 'info_title_' . $i ] ); ?></h4>
											
											<span class="mkdf-issc-separator"></span>
											
											<?php if ( ! empty( $object[ 'info_text_' . $i ] ) ) { ?>
												<p><?php echo esc_html( $object[ 'info_text_' . $i ] ); ?></p>
											<?php } ?>
											
											<?php if ( ! empty( $object[ 'info_link_' . $i ] ) && ! empty( $object[ 'info_link_text_' . $i ] ) ) { ?>
												<a href="<?php echo esc_url( $object[ 'info_link_' . $i ] ); ?>"
												   target="<?php echo esc_attr( $object[ 'info_link_target_' . $i ] ); ?>"><?php echo esc_html( $object[ 'info_link_text_' . $i ] ); ?></a>
											<?php } ?>
										</div>
									</div>
								</div>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="mkdf-issc-media-section">
			<?php $k = 0; ?>
			<?php foreach ( $items_showcase_custom as $object ) : ?>
				<?php if ( ! empty( $object['image'] ) ) { ?>
					<div class="mkdf-issc-media-image" data-index="<?php echo esc_attr( $k++ ); ?>">
						<span class="mkdf-angle one"></span>
						<span class="mkdf-angle two"></span>
						<span class="mkdf-angle three"></span>
						<span class="mkdf-angle four"></span>
						<?php echo wp_get_attachment_image( $object['image'], 'full' ); ?>
					</div>
				<?php } ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>