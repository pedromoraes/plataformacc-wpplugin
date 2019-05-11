<?php

$components = array(
    "shortcodes" => array(
        array(
            "path" => "shortcodes/telegram_embed/telegram_embed.php",
            "tag" => "telegram_embed",
            "method_name" => "pcc_telegram_embed_shortcode"
        ),
        array(
            "path" => "shortcodes/gallery/gallery.php",
            "tag" => "plataformacc_gallery",
            "method_name" => "pcc_gallery_shortcode"
        ),
        array(
            "path" => "shortcodes/forwarded_from/forwarded_from.php",
            "tag" => "plataformacc_forwarded_from",
            "method_name" => "pcc_forwarded_from_shortcode"
        ),
        array(
            "path" => "shortcodes/link_preview/link_preview.php",
            "tag" => "pcclinkpreview",
            "method_name" => "pcc_link_preview_shortcode"
        )
    ),
    "rpc" => array(
        array(
            "path" => "rpc/getPostByTelegramID.php",
            "rpc_method_name" => "plataformacc.getPostByTelegramID",
            "method_name" => "pcc_getPostByTelegramID"
        )
    )
);

return $components;
