<?php if( grandprix_mikado_is_plugin_installed( 'core' ) ) { ?>
    <div class="mkdf-blog-like">
        <?php if( function_exists('grandprix_core_get_like') ) grandprix_core_get_like(); ?>
    </div>
<?php } ?>