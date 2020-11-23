<?php
/**
 * Plugin Name: Custom Quiz
 * Description: This is Custom Quiz Plugin
 * Version:     1.0
 * Author:      Mohit Chandel
  */


/**
** REgister Quiz Custom Post Type
*/
function ct_quiz_custom_post_type() {
    $args = array(
        'labels' => array(
        'name' => 'Custom Quiz',
        'singular_name' => 'Custom Quiz'
    ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'custom-quiz'),
        'supports' =>array('title'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-book'
    );
     
    register_post_type('Custom Quiz', $args);
}
    
add_action('init', 'ct_quiz_custom_post_type');