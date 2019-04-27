<?php
/**
 * @package PlataformaCC
 * @version 1.6
 */
/*
Plugin Name: PlataformaCC
Plugin URI: http://wordpress.org/plugins/plataformacc/
Description: PlataformaCC Network Support Plugin
Author: Pedro Moraes
Version: 0.1
Author URI: http://plataforma.cc/
 */

function pcc_linkpreview_shortcode( $atts, $content )
{
	$atts = shortcode_atts( array( 'title' => '', 'description' => '', 'url' => '', 'image' => '', 'favicon' => ''), $atts );
	$plugin_base_path = plugin_dir_path( __FILE__ );
	ob_start();
	require( "$plugin_base_path/template.php" );
	return ob_get_clean();
}

add_shortcode( 'pcclinkpreview', 'pcc_linkpreview_shortcode' );

function pcc_linkpreview_scripts()
{
    wp_enqueue_style('pcclinkpreview', plugins_url('style.css', __FILE__));
}
add_action( 'wp_enqueue_scripts', 'pcc_linkpreview_scripts' );

function plataformacc_getPostByTelegramID( $args ) {
    global $wp_xmlrpc_server;
    $wp_xmlrpc_server->escape( $args );

    $msg_id  = $args[0];

    $query = new WP_Query(array(
	'meta_key' => 'telegram_id',
	'meta_value' => $msg_id
    ));

    $post = array_shift($query->posts);
    if ($post) return $post->ID;
    return null;
}

function plataformacc_xmlrpc_methods( $methods ) {
    $methods['plataformacc.getPostByTelegramID'] = 'plataformacc_getPostByTelegramID';
    return $methods;   
}
add_filter( 'xmlrpc_methods', 'plataformacc_xmlrpc_methods');
