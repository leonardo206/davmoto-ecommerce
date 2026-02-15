<?php
$share_type = isset( $share_type ) ? $share_type : 'dropdown';
$dd_type    = isset( $dd_type ) ? $dd_type : 'left';
?>
<?php if ( grandprix_mikado_is_plugin_installed( 'core' ) && grandprix_mikado_options()->getOptionValue( 'enable_social_share' ) === 'yes' && grandprix_mikado_options()->getOptionValue( 'enable_social_share_on_post' ) === 'yes' ) { ?>
	<div class="mkdf-blog-share">
		<?php echo grandprix_mikado_get_social_share_html( array( 'type' => $share_type, 'dropdown_behavior' => $dd_type ) ); ?>
	</div>
<?php } ?>