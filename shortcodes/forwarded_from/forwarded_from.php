<?php
function pcc_forwarded_from_shortcode( $atts, $content )
{
	$link = "<a href=\"http://t.me/$atts[from]\">$atts[from]</a>";
	$content = do_shortcode($content);
	return "<strong>Forwarded from $link</strong><blockquote>$content</blockquote>";
}
