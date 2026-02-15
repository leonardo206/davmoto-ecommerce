<?php
if ( post_password_required() ) {
	return;
}

if ( comments_open() || get_comments_number() ) { ?>
	<div class="mkdf-comment-holder clearfix" id="comments">
		<?php if ( have_comments() ) { ?>
			<div class="mkdf-comment-holder-inner">
				<h2 class="mkdf-comments-title"><?php esc_html_e( 'Comments', 'grandprix' ); ?></h2>
				<div class="mkdf-comments">
					<ul class="mkdf-comment-list">
						<?php wp_list_comments( array_unique( array_merge( array( 'callback' => 'grandprix_mikado_comment' ), apply_filters( 'grandprix_mikado_filter_comments_callback', array() ) ) ) ); ?>
					</ul>
				</div>
			</div>
		<?php } ?>
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
			<p><?php esc_html_e( 'Sorry, the comment form is closed at this time.', 'grandprix' ); ?></p>
		<?php } ?>
	</div>
	<?php
		$mkdf_commenter = wp_get_current_commenter();
		$mkdf_req       = get_option( 'require_name_email' );
		$mkdf_aria_req  = ( $mkdf_req ? " aria-required='true'" : '' );
	    $mkdf_consent  = empty( $mkdf_commenter['comment_author_email'] ) ? '' : ' checked="checked"';
		
		$mkdf_args = array(
			'id_form'              => 'commentform',
			'id_submit'            => 'submit_comment',
			'title_reply'          => esc_html__( 'Post a Comment', 'grandprix' ),
			'title_reply_before'   => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</h2>',
			'title_reply_to'       => esc_html__( 'Post a Reply to %s', 'grandprix' ),
			'cancel_reply_link'    => '<span class="mkdf-link-label">' . esc_html__( 'cancel reply', 'grandprix' ) . '</span><span class="mkdf-link-arrow ion-ios-play"></span>',
			'label_submit'         => esc_html__( 'Submit', 'grandprix' ),
			'comment_field'        => apply_filters( 'grandprix_mikado_filter_comment_form_textarea_field', '<label> ' . esc_attr__( 'Your comment', 'grandprix' ) . ' </label><textarea id="comment" name="comment" cols="45" rows="4" aria-required="true"></textarea>' ),
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'fields'               => apply_filters( 'grandprix_mikado_filter_comment_form_default_fields', array(
				'author' => '<label> '. esc_attr__( 'Your Name', 'grandprix' ) .' </label><input id="author" name="author" type="text" value="' . esc_attr( $mkdf_commenter['comment_author'] ) . '" ' . $mkdf_aria_req . ' />',
				'email'  => '<label> '. esc_attr__( 'Your Email', 'grandprix' ) .' </label><input id="email" name="email" type="text" value="' . esc_attr( $mkdf_commenter['comment_author_email'] ) . '" ' . $mkdf_aria_req . ' />',
				'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes" ' . $mkdf_consent . ' />' .
					'<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'grandprix' ) . '</label></p>',
			) ),
            'submit_button'         => '<button name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s"><span class="mkdf-btn-text">%4$s</span></button>',
            'class_submit'          => 'mkdf-btn mkdf-btn-medium mkdf-btn-solid',
		);

	$mkdf_args = apply_filters( 'grandprix_mikado_filter_comment_form_final_fields', $mkdf_args );
		
	if ( get_comment_pages_count() > 1 ) { ?>
		<div class="mkdf-comment-pager">
			<p><?php paginate_comments_links(); ?></p>
		</div>
	<?php } ?>

    <?php
    $mkdf_show_comment_form = apply_filters('grandprix_mikado_filter_show_comment_form_filter', true);
    if($mkdf_show_comment_form) {
    ?>
        <div class="mkdf-comment-form">
            <?php comment_form( $mkdf_args ); ?>
        </div>
    <?php } ?>
<?php } ?>	