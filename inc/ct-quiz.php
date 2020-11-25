<?php


/**
** Register Quiz Style And Scripts
*/


function ct_quiz_register_script() {
    wp_register_script( 'ct_quiz_vue', CTQUIZ_URL .'/assets/js/vue.js');
    wp_register_script( 'ct_quiz_jquery', CTQUIZ_URL .'/assets/js/jquery.js');
    wp_register_style( 'ct_quiz_style', CTQUIZ_URL .'/assets/css/style.css');
    wp_register_style( 'ct_quiz_style_bootstrap', CTQUIZ_URL .'/assets/css/bt.css');
}
add_action('init', 'ct_quiz_register_script');

function ct_quiz_enqueue_style(){
    wp_enqueue_script('ct_quiz_vue');
    wp_enqueue_script('ct_quiz_jquery');
    wp_enqueue_style( 'ct_quiz_style' );
    wp_enqueue_style( 'ct_quiz_style_bootstrap' );
}
add_action('admin_enqueue_scripts', 'ct_quiz_enqueue_style');