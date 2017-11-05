<?php

class SparkSpringChild {

	function __construct(){
		add_action( 'wp_enqueue_scripts', array( $this, 'wp_enqueue_scripts' ) );
	}

	function wp_enqueue_scripts(){
		$msw_object = array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
            'google_map_data' => get_google_map_data(),
			'home_url' => home_url(),
			'show_dashboard_link' => current_user_can( 'manage_options' ) ? 1 : 0,
			'site_url' => site_url(),
			'stylesheet_directory' => get_stylesheet_directory_uri()
		);
		$google_api_key = get_field( 'msw_google_map_api_key', 'option' );
		wp_enqueue_script( 'googlemaps', 'https://maps.googleapis.com/maps/api/js?key=' . $google_api_key, array( 'theme' ), null, true );
		wp_enqueue_script( 'theme', get_stylesheet_directory_uri() . '/scripts.min.js' );
		wp_localize_script( 'theme', 'MSWObject', $msw_object );

		wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Oswald|Work+Sans:400,700' );
		wp_enqueue_style( 'theme', get_stylesheet_uri(), null, time() );
	}

}

$SparkSpringChild = new SparkSpringChild();