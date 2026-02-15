<?php

if ( ! function_exists( 'grandprix_core_import_object' ) ) {
	function grandprix_core_import_object() {
		$grandprix_core_import_object = new GrandPrixCoreImport();
	}
	
	add_action( 'init', 'grandprix_core_import_object' );
}

if ( ! function_exists( 'grandprix_core_data_import' ) ) {
	function grandprix_core_data_import() {
		$importObject = GrandPrixCoreImport::getInstance();
		
		if ( $_POST['import_attachments'] == 1 ) {
			$importObject->attachments = true;
		} else {
			$importObject->attachments = false;
		}
		
		$folder = "grandprix/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_content( $folder . $_POST['xml'] );
		
		die();
	}
	
	add_action( 'wp_ajax_grandprix_core_action_import_content', 'grandprix_core_data_import' );
}

if ( ! function_exists( 'grandprix_core_widgets_import' ) ) {
	function grandprix_core_widgets_import() {
		$importObject = GrandPrixCoreImport::getInstance();
		
		$folder = "grandprix/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_widgets( $folder . 'widgets.txt', $folder . 'custom_sidebars.txt' );
		
		die();
	}
	
	add_action( 'wp_ajax_grandprix_core_action_import_widgets', 'grandprix_core_widgets_import' );
}

if ( ! function_exists( 'grandprix_core_options_import' ) ) {
	function grandprix_core_options_import() {
		$importObject = GrandPrixCoreImport::getInstance();
		
		$folder = "grandprix/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_options( $folder . 'options.txt' );
		
		die();
	}
	
	add_action( 'wp_ajax_grandprix_core_action_import_options', 'grandprix_core_options_import' );
}

if ( ! function_exists( 'grandprix_core_other_import' ) ) {
	function grandprix_core_other_import() {
		$importObject = GrandPrixCoreImport::getInstance();
		
		$folder = "grandprix/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_options( $folder . 'options.txt' );
		$importObject->import_widgets( $folder . 'widgets.txt', $folder . 'custom_sidebars.txt' );
		$importObject->import_menus( $folder . 'menus.txt' );
		$importObject->import_settings_pages( $folder . 'settingpages.txt' );
		
		$importObject->mkdf_update_meta_fields_after_import( $folder );
		$importObject->mkdf_update_options_after_import( $folder );
		
		if ( grandprix_core_is_revolution_slider_installed() ) {
			$importObject->rev_slider_import( $folder );
		}

		global $grandprix_mikado_global_options;

		$grandprix_mikado_global_options = get_option( 'mkdf_options_grandprix' );

		do_action( 'grandprix_core_action_after_import_completed' );
		
		die();
	}
	
	add_action( 'wp_ajax_grandprix_core_action_import_other_elements', 'grandprix_core_other_import' );
}