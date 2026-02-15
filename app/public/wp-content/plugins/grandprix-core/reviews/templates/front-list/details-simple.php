<div class="mkdf-reviews-list-info mkdf-reviews-simple">
	<div class="mkdf-reviews-number-wrapper">
		<<?php echo grandprix_mikado_core_escape_title_tag( $title_tag ); ?> class="mkdf-reviews-summary">
            <span class="mkdf-reviews-number">
                <?php echo esc_html( $rating_number ); ?>
            </span>
			<span class="mkdf-reviews-label">
                <?php echo esc_html( $rating_label ); ?>
            </span>
		</<?php echo grandprix_mikado_core_escape_title_tag( $title_tag ); ?>>
		<span class="mkdf-stars-wrapper">
            <?php foreach ( $post_ratings as $rating ) { ?>
	            <span class="mkdf-stars-wrapper-inner">
                    <span class="mkdf-stars-items">
                        <?php
                        $review_rating = grandprix_core_post_average_rating( $rating );
                        for ( $i = 1; $i <= $review_rating; $i ++ ) { ?>
	                        <i class="fa fa-star" aria-hidden="true"></i>
                        <?php } ?>
                    </span>
		            <?php if ( isset( $rating['label'] ) && ! empty( $rating['label'] ) ) { ?>
			            <span class="mkdf-stars-label">
			                <?php echo esc_html( $rating['label'] ); ?>
			            </span>
		            <?php } ?>
                </span>
            <?php } ?>
        </span>
	</div>
</div>