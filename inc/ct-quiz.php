<?php


/**
** Register Quiz Style And Scripts
*/


function ct_quiz_register_script() {
    wp_register_script( 'ct_quiz_jquery', CTQUIZ_URL .'/assets/js/jquery.js');
    wp_register_script( 'ct_quiz_script', CTQUIZ_URL .'/assets/js/script.js', array(), false, true);
    wp_register_style( 'ct_quiz_style', CTQUIZ_URL .'/assets/css/style.css');
    wp_register_style( 'ct_quiz_style_bootstrap', CTQUIZ_URL .'/assets/css/bt.css');
    wp_register_style( 'Font_Awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' );
}
add_action('init', 'ct_quiz_register_script');

function ct_quiz_enqueue_style(){
    wp_enqueue_script('ct_quiz_jquery');
    wp_enqueue_script('ct_quiz_script');
    wp_enqueue_style( 'ct_quiz_style' );
    wp_enqueue_style( 'ct_quiz_style_bootstrap' );
    wp_enqueue_style('Font_Awesome');
}
add_action('admin_enqueue_scripts', 'ct_quiz_enqueue_style');