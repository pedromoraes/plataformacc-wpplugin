<?php

function pcc_telegram_embed_shortcode( $atts ) {
    return "<script async src=\"https://telegram.org/js/telegram-widget.js?5\" data-telegram-post=\"$atts[channel]/$atts[id]\" data-width=\"100%\"></script>";
}