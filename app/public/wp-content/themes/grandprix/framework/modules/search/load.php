<?php

include_once GRANDPRIX_MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/search/functions.php';

//load global search options
include_once GRANDPRIX_MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/search/admin/options-map/search-map.php';

//load widgets
foreach ( glob( GRANDPRIX_MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/search/widgets/*/load.php' ) as $widget_load ) {
    include_once $widget_load;
}