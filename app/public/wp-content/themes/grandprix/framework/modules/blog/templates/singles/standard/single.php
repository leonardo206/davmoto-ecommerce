<?php

grandprix_mikado_get_single_post_format_html( $blog_single_type );

do_action( 'grandprix_mikado_action_after_article_content' );

grandprix_mikado_get_module_template_part( 'templates/parts/single/author-info', 'blog' );

grandprix_mikado_get_module_template_part( 'templates/parts/single/single-navigation', 'blog' );

grandprix_mikado_get_module_template_part( 'templates/parts/single/related-posts', 'blog', '', $single_info_params );

grandprix_mikado_get_module_template_part( 'templates/parts/single/comments', 'blog' );