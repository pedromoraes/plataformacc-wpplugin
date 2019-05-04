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

$components = ( include 'config/components.php' );

/* Include Shortcodes */
foreach ( $components['shortcodes'] as $shortcode ) {
	include $shortcode['path'];
	add_shortcode( $shortcode['tag'] , $shortcode['method_name'] );
}

/* Include RPC Methods */
function plataformacc_xmlrpc_methods( $methods ) {
	global $components;
	foreach ( $components['rpc'] as $rpc ) {
		include $rpc['path'];
		$methods[$rpc['rpc_method_name']] = $rpc['method_name'];
	}
	return $methods;   
}
add_filter( 'xmlrpc_methods', 'plataformacc_xmlrpc_methods' );