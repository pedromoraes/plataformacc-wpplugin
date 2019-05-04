<?php
function pcc_gallery_shortcode( $atts, $content )
{
	$images = get_attached_media( 'image' );
	ob_start();
	if ( $content ) {
		echo "<p>$content</p>";
	}
	foreach ( $images as $img ) {
		echo wp_get_attachment_image( $img->ID, 'full' );
	}
	return ob_get_clean();
}
