<?php grandprix_mikado_get_module_template_part( 'widgets/woocommerce-dropdown-cart/templates/parts/opener', 'woocommerce' ); ?>

<?php if ( is_object( WC()->cart ) ) { ?>
<div class="mkdf-sc-dropdown">
	<div class="mkdf-sc-dropdown-inner">
		<?php if ( ! WC()->cart->is_empty() ) {
			grandprix_mikado_get_module_template_part( 'widgets/woocommerce-dropdown-cart/templates/parts/loop', 'woocommerce' );
			
			grandprix_mikado_get_module_template_part( 'widgets/woocommerce-dropdown-cart/templates/parts/order-details', 'woocommerce' );
			
			grandprix_mikado_get_module_template_part( 'widgets/woocommerce-dropdown-cart/templates/parts/button', 'woocommerce' );
		} else {
			grandprix_mikado_get_module_template_part( 'widgets/woocommerce-dropdown-cart/templates/posts-not-found', 'woocommerce' );
		} ?>
	</div>
</div>

<?php } ?>