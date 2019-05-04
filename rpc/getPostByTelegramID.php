<?php

function pcc_getPostByTelegramID( $args ) {
    global $wp_xmlrpc_server;
    $wp_xmlrpc_server->escape( $args );

    $msg_id  = $args[0];
    $query = get_posts(
        array(
            'post_status' => 'publish',
            'post_type'        => 'post',
            'meta_key' => 'telegram_id',
            'meta_value' => $msg_id
        )
    );

    $post = array_shift( $query );
    if ( empty($post) ) return null;
    if ( sizeof( get_post_meta( $post->ID, 'telegram_id' ) ) > 1 ) return -1; //wont update, multiple
    if ( sizeof( get_attached_media( 'image', $post->ID ) ) > 0 ) return -2; //wont update, has images
    return $post->ID;
}