<?php
function pcc_gallery_autolink( $text ) {
	$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
	if ( preg_match( $reg_exUrl, $text, $url ) )
		return preg_replace($reg_exUrl, "<a href=\"{$url[0]}\">{$url[0]}</a>", $text);
	return $text;
}

function pcc_gallery_shortcode( $atts, $content )
{
	$images = get_attached_media( 'image' );
	ob_start();
	if ( $content ) {
		$content = pcc_gallery_autolink( $content );
		echo "<p>$content</p>";
	}
	foreach ( $images as $img ) {
		echo wp_get_attachment_image( $img->ID, 'full' );
	}
	return ob_get_clean();
}
