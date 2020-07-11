<?php

function test_menu() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'footer-menu' => __( 'Footer Menu' )
        )
    );
}
add_action( 'init', 'test_menu' );

?>
