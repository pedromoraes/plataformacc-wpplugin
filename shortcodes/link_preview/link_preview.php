<?php

function pcc_link_preview_shortcode( $atts, $content ) {
	$atts = shortcode_atts( array( 'title' => '', 'description' => '', 'url' => '', 'image' => '', 'favicon' => '' ), $atts );
	$plugin_base_path = plugin_dir_path( __FILE__ );
	ob_start();
	require( "$plugin_base_path/template.php" );
	return ob_get_clean();
}

function pcc_link_preview_scripts() {
    wp_enqueue_style( 'pcclinkpreview', plugins_url( 'style.css', __FILE__ ) );
}
add_action( 'wp_enqueue_scripts', 'pcc_link_preview_scripts' );
