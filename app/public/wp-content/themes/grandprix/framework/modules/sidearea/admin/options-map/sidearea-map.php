<?php

if ( ! function_exists( 'grandprix_mikado_sidearea_options_map' ) ) {
	function grandprix_mikado_sidearea_options_map() {

        grandprix_mikado_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'grandprix'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = grandprix_mikado_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'grandprix'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-opener',
                'label'         => esc_html__('Side Area Type', 'grandprix'),
                'description'   => esc_html__('Choose a type of Side Area', 'grandprix'),
                'options'       => array(
                    'side-menu-slide-from-opener'      => esc_html__('Slide from Opener', 'grandprix')
                ),
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'grandprix'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 520px.', 'grandprix'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = grandprix_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-opener',
                    )
                )
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'grandprix'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'grandprix'),
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'grandprix'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'grandprix'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_icon_source',
                'default_value' => 'icon_pack',
                'label'         => esc_html__('Select Side Area Icon Source', 'grandprix'),
                'description'   => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'grandprix'),
                'options'       => grandprix_mikado_get_icon_sources_array()
            )
        );

        $side_area_icon_pack_container = grandprix_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'        => $side_area_icon_pack_container,
                'type'          => 'select',
                'name'          => 'side_area_icon_pack',
                'default_value' => 'font_elegant',
                'label'         => esc_html__('Side Area Icon Pack', 'grandprix'),
                'description'   => esc_html__('Choose icon pack for Side Area icon', 'grandprix'),
                'options'       => grandprix_mikado_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $side_area_svg_icons_container = grandprix_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_svg_icons_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'svg_path'
                    )
                )
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_icon_svg_path',
                'label'       => esc_html__('Side Area Icon SVG Path', 'grandprix'),
                'description' => esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'grandprix'),
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_close_icon_svg_path',
                'label'       => esc_html__('Side Area Close Icon SVG Path', 'grandprix'),
                'description' => esc_html__('Enter your Side Area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'grandprix'),
            )
        );

        $side_area_icon_style_group = grandprix_mikado_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'grandprix'),
                'description' => esc_html__('Define styles for Side Area icon', 'grandprix')
            )
        );

        $side_area_icon_style_row1 = grandprix_mikado_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'grandprix')
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'grandprix')
            )
        );

        $side_area_icon_style_row2 = grandprix_mikado_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'grandprix')
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'grandprix')
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'grandprix'),
                'description' => esc_html__('Choose a background color for Side Area', 'grandprix')
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'grandprix'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'grandprix'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        grandprix_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'grandprix'),
                'description'   => esc_html__('Choose text alignment for side area', 'grandprix'),
                'options'       => array(
                    ''       => esc_html__('Default', 'grandprix'),
                    'left'   => esc_html__('Left', 'grandprix'),
                    'center' => esc_html__('Center', 'grandprix'),
                    'right'  => esc_html__('Right', 'grandprix')
                )
            )
        );
    }

    add_action('grandprix_mikado_action_options_map', 'grandprix_mikado_sidearea_options_map', grandprix_mikado_set_options_map_position( 'sidearea' ) );
}