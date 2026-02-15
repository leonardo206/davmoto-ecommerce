<?php
get_header();
grandprix_mikado_get_title();
do_action( 'grandprix_mikado_action_before_main_content' ); ?>
<div class="mkdf-container mkdf-default-page-template">
	<?php do_action( 'grandprix_mikado_action_after_container_open' ); ?>
	<div class="mkdf-container-inner clearfix">
		<?php
			$grandprix_taxonomy_id   = get_queried_object_id();
			$grandprix_taxonomy_type = is_tax( 'portfolio-tag' ) ? 'portfolio-tag' : 'portfolio-category';
			$grandprix_taxonomy      = ! empty( $grandprix_taxonomy_id ) ? get_term_by( 'id', $grandprix_taxonomy_id, $grandprix_taxonomy_type ) : '';
			$grandprix_taxonomy_slug = ! empty( $grandprix_taxonomy ) ? $grandprix_taxonomy->slug : '';
			$grandprix_taxonomy_name = ! empty( $grandprix_taxonomy ) ? $grandprix_taxonomy->taxonomy : '';
			
			grandprix_core_get_archive_portfolio_list( $grandprix_taxonomy_slug, $grandprix_taxonomy_name );
		?>
	</div>
	<?php do_action( 'grandprix_mikado_action_before_container_close' ); ?>
</div>
<?php get_footer(); ?>
