<?php

//define constants
define( 'GRANDPRIX_MIKADO_ROOT', get_template_directory_uri() );
define( 'GRANDPRIX_MIKADO_ROOT_DIR', get_template_directory() );
define( 'GRANDPRIX_MIKADO_ASSETS_ROOT', GRANDPRIX_MIKADO_ROOT . '/assets' );
define( 'GRANDPRIX_MIKADO_ASSETS_ROOT_DIR', GRANDPRIX_MIKADO_ROOT_DIR . '/assets' );
define( 'GRANDPRIX_MIKADO_FRAMEWORK_ROOT', GRANDPRIX_MIKADO_ROOT . '/framework' );
define( 'GRANDPRIX_MIKADO_FRAMEWORK_ROOT_DIR', GRANDPRIX_MIKADO_ROOT_DIR . '/framework' );
define( 'GRANDPRIX_MIKADO_FRAMEWORK_ADMIN_ASSETS_ROOT', GRANDPRIX_MIKADO_ROOT . '/framework/admin/assets' );
define( 'GRANDPRIX_MIKADO_FRAMEWORK_ICONS_ROOT', GRANDPRIX_MIKADO_ROOT . '/framework/lib/icons-pack' );
define( 'GRANDPRIX_MIKADO_FRAMEWORK_ICONS_ROOT_DIR', GRANDPRIX_MIKADO_ROOT_DIR . '/framework/lib/icons-pack' );
define( 'GRANDPRIX_MIKADO_FRAMEWORK_MODULES_ROOT', GRANDPRIX_MIKADO_ROOT . '/framework/modules' );
define( 'GRANDPRIX_MIKADO_FRAMEWORK_MODULES_ROOT_DIR', GRANDPRIX_MIKADO_ROOT_DIR . '/framework/modules' );
define( 'GRANDPRIX_MIKADO_FRAMEWORK_HEADER_ROOT', GRANDPRIX_MIKADO_ROOT . '/framework/modules/header' );
define( 'GRANDPRIX_MIKADO_FRAMEWORK_HEADER_ROOT_DIR', GRANDPRIX_MIKADO_ROOT_DIR . '/framework/modules/header' );
define( 'GRANDPRIX_MIKADO_FRAMEWORK_HEADER_TYPES_ROOT', GRANDPRIX_MIKADO_ROOT . '/framework/modules/header/types' );
define( 'GRANDPRIX_MIKADO_FRAMEWORK_HEADER_TYPES_ROOT_DIR', GRANDPRIX_MIKADO_ROOT_DIR . '/framework/modules/header/types' );
define( 'GRANDPRIX_MIKADO_FRAMEWORK_SEARCH_ROOT', GRANDPRIX_MIKADO_ROOT . '/framework/modules/search' );
define( 'GRANDPRIX_MIKADO_FRAMEWORK_SEARCH_ROOT_DIR', GRANDPRIX_MIKADO_ROOT_DIR . '/framework/modules/search' );
define( 'GRANDPRIX_MIKADO_PROFILE_SLUG', 'mikado' );
define( 'GRANDPRIX_MIKADO_OPTIONS_SLUG', 'grandprix_mikado_theme_menu');

//include necessary files
include_once GRANDPRIX_MIKADO_ROOT_DIR . '/framework/mkdf-framework.php';
include_once GRANDPRIX_MIKADO_ROOT_DIR . '/includes/nav-menu/mkdf-menu.php';
require_once GRANDPRIX_MIKADO_ROOT_DIR . '/includes/plugins/class-tgm-plugin-activation.php';
include_once GRANDPRIX_MIKADO_ROOT_DIR . '/includes/plugins/plugins-activation.php';
include_once GRANDPRIX_MIKADO_ROOT_DIR . '/assets/custom-styles/general-custom-styles.php';
include_once GRANDPRIX_MIKADO_ROOT_DIR . '/assets/custom-styles/general-custom-styles-responsive.php';

if ( file_exists( GRANDPRIX_MIKADO_ROOT_DIR . '/export' ) ) {
	include_once GRANDPRIX_MIKADO_ROOT_DIR . '/export/export.php';
}

if ( ! is_admin() ) {
	include_once GRANDPRIX_MIKADO_ROOT_DIR . '/includes/mkdf-body-class-functions.php';
	include_once GRANDPRIX_MIKADO_ROOT_DIR . '/includes/mkdf-loading-spinners.php';
}