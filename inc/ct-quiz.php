<?php


/**
** Register Quiz Style And Scripts
*/


function ct_quiz_register_script() {
    // wp_register_script( 'ct_quiz_jquery', CTQUIZ_URL .'/assets/js/script,js');
    wp_register_style( 'ct_quiz_style', CTQUIZ_URL .'/assets/css/style.css');
}
add_action('init', 'ct_quiz_register_script');

function ct_quiz_enqueue_style(){
    // wp_enqueue_script('ct_quiz_jquery');
    wp_enqueue_style( 'ct_quiz_style' );
}
add_action('admin_enqueue_scripts', 'ct_quiz_enqueue_style');