<div class="mkdf-fullscreen-menu-holder-outer">
	<div class="mkdf-fullscreen-menu-holder">
		<div class="mkdf-fullscreen-menu-holder-inner">
			<?php if ($fullscreen_menu_in_grid) : ?>
				<div class="mkdf-container-inner">
			<?php endif; ?>
			
			<?php if ( grandprix_mikado_is_header_widget_area_active( 'one' ) ) { ?>
				<div class="mkdf-fullscreen-above-menu-widget-holder">
					<?php grandprix_mikado_get_header_widget_area_one(); ?>
				</div>
			<?php } ?>
			
			<?php 
			//Navigation
			grandprix_mikado_get_module_template_part('templates/full-screen-menu-navigation', 'header/types/header-minimal');;

			?>
			
			<?php if ( grandprix_mikado_is_header_widget_area_active( 'two' ) ) { ?>
				<div class="mkdf-fullscreen-below-menu-widget-holder">
					<?php grandprix_mikado_get_header_widget_area_two(); ?>
				</div>
			<?php } ?>
			
			<?php if ($fullscreen_menu_in_grid) : ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>