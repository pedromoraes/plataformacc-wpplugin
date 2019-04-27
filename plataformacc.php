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

function pcc_gallery_shortcode( $atts, $content )
{
	$images = get_attached_media( 'image' );
	ob_start();
	if ( $content ) {
		echo "<p>$content</p>";
	}
	foreach ($images as $img) {
		echo wp_get_attachment_image($img->ID, 'full');
	}
	return ob_get_clean();
}
add_shortcode( 'plataformacc_gallery', 'pcc_gallery_shortcode' );


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
    $query = get_posts(array(
	'post_status' => 'publish',
	'post_type'        => 'post',
	'meta_key' => 'telegram_id',
	'meta_value' => $msg_id
    ));

    $post = array_shift($query);
    if (empty($post)) return null;
    if (sizeof(get_post_meta($post->ID, 'telegram_id')) > 1) return -1; //wont update, multiple
    if (sizeof(get_attached_media('image', $post->ID))> 0) return -2; //wont update, has images
    return $post->ID;
}

function plataformacc_xmlrpc_methods( $methods ) {
    $methods['plataformacc.getPostByTelegramID'] = 'plataformacc_getPostByTelegramID';
    return $methods;   
}
add_filter( 'xmlrpc_methods', 'plataformacc_xmlrpc_methods');
