<?php
/**
 * Plugin Name: Custom Quiz
 * Description: This is Custom Quiz Plugin
 * Version:     1.0
 * Author:      Mohit Chandel
*/
define( 'CTQUIZ_URL', plugin_dir_url(__FILE__) );
define( 'CTQUIZ_PATH', plugin_dir_path(__FILE__) );

if( file_exists( CTQUIZ_PATH. 'inc/ct-quiz.php') ) {
    require_once CTQUIZ_PATH. 'inc/ct-quiz.php';
}

/**
** Register Quiz Custom Post Type
*/
function ct_quiz_custom_post_type() {
    $args = array(
        'labels' => array(
        'name' => 'CustomQuiz',
        'add_new_item' => 'Add New Quiz',
        'edit_item' => 'Edit Quiz' ,
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


/**
** Register Quiz Custom Meta Fields
*/

function ct_show_quiz_meta_box() {
    global $post;
?>
    <div class="question">
        <h5>Question :</h5>
        <input type="text"/>
        <h5>Options:</h5>
        <div class="options">
            <div class="option-div">
                <div class="option" id="option-1">
                    <input type="text"/>
                </div>
                <div class="option" id="option-1">
                    <input type="text"/>
                    <button>Add New</button>
                    <button>Remove</button>
                </div>
            </div>
        </div>
    </div>

 <?php 
} 

function ct_quiz_meta_box() {
  add_meta_box(
      'ct_quiz_meta_box_id',
      'Questions',
      'ct_show_quiz_meta_box',
      'CustomQuiz',
      'normal',
      'core'
      );
}
add_action( 'add_meta_boxes', "ct_quiz_meta_box" );