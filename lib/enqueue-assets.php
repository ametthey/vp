<?php

	/**************************************************************************
	* Après avoir cloner le projet:
	* changer le mot voxpopuli par le nom du projet
	* en terme d'organiser, on renomme les handle par le
	* nom du projet pour mieux s'y retrouver
	* ex: voxpopuli_assets -> myProject_assets
	***********************************************************************/

	function voxpopuli_assets() {
		wp_enqueue_style( 'voxpopuli-stylesheet', get_template_directory_uri() . '/dist/assets/css/bundle.css', array(), '1.0.0' ,  'all' );

		wp_enqueue_script( 'voxpopuli-scripts', get_template_directory_uri() . '/dist/assets/js/main.js', array('jquery'), '1.0.1' ,   true );

		// wp_enqueue_script( 'voxpopuli-admin-scripts', get_template_directory_uri() . '/dist/assets/js/admin.js', array() ,  true );
	}

	add_action( 'wp_enqueue_scripts', 'voxpopuli_assets' );

	// function voxpopuli_admin_assets() {
	// 	wp_enqueue_script( 'voxpopuli-admin-scripts', get_template_directory_uri() . '/dist/assets/js/admin.js', array(), '1.0.0' , true );
	// }
    //
	// add_action( 'admin_enqueue_scripts', 'voxpopuli_admin_assets' );

	/***********************************************************************
	*
	* STYLE LOGIN & REGISTER
	*
	***********************************************************************/

    function voxpopuli_register_assets() {
        wp_enqueue_style( 'voxpopuli-register-stylesheet', get_template_directory_uri() . '/dist/assets/css/register.css', array(), '1.0.0' , 'all' );
    }
    add_action('login_enqueue_scripts', 'voxpopuli_register_assets');


	/***********************************************************************
	*
	* Remove Block Library
	*
	***********************************************************************/

	function voxpopuli_remove_block_library_css(){
		wp_dequeue_style( 'wp-block-library' );
	}
	add_action( 'wp_enqueue_scripts', 'voxpopuli_remove_block_library_css' );



	/***********************************************************************
	*
	* Defer JavaScript Scripts
	*
	***********************************************************************/

	function voxpopuli_defer_parsing_of_js( $url ) {
		if ( is_user_logged_in() ) return $url; //don't break WP Admin
		if ( FALSE === strpos( $url, '.js' ) ) return $url;
		if ( strpos( $url, 'jquery.js' ) ) return $url;
		return str_replace( ' src', ' defer src', $url );
	}
	add_filter( 'script_loader_tag', 'voxpopuli_defer_parsing_of_js', 10 );



	/***********************************************************************
	*
	* Remove jQuery
	*
	***********************************************************************/

	// function no_more_jquery(){
	// 		wp_deregister_script('jquery');
	// }
	// add_action('wp_enqueue_scripts', 'no_more_jquery');


	/***********************************************************************
	*
	* Remove jQuery Migrate
	*
	***********************************************************************/

	function remove_jquery_migrate( $scripts ) {
	   if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
			$script = $scripts->registered['jquery'];
	   if ( $script->deps ) {
	// Check whether the script has any dependencies

			$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
			}
		}
	}
	add_action( 'wp_default_scripts', 'remove_jquery_migrate' );



	/***********************************************************************
	*
	* Remove Genericons
	*
	***********************************************************************/

	function dequeue_my_css() {
		wp_dequeue_style('genericons');
		wp_deregister_style('genericons');
	}
	add_action('wp_enqueue_scripts','dequeue_my_css', 100);



	/***********************************************************************
	*
	* Remove Google Fonts from parent Theme (twentysixteen)
	*
	***********************************************************************/

	// function wpse_dequeue_google_fonts() {
	// 	wp_dequeue_style( 'twentysixteen-fonts' );
	// }
	// add_action( 'wp_enqueue_scripts', 'wpse_dequeue_google_fonts', 20 );

	/***********************************************************************
	*
	* Disable emojis
	*
	***********************************************************************/

	function disable_emojis() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
		add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
	}
	add_action( 'init', 'disable_emojis' );

	function disable_emojis_tinymce( $plugins ) {
		 if ( is_array( $plugins ) ) {
			 return array_diff( $plugins, array( 'wpemoji' ) );
				 } else {
				 return array();
		 }
	}

	function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
		if ( 'dns-prefetch' == $relation_type ) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

		$urls = array_diff( $urls, array( $emoji_svg_url ) );
	 }

	return $urls;
	}

