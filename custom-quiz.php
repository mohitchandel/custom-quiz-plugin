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

<div class="py-2">
    <a class="btn btn-dark rounded-0" onclick="addNewQuestion()">Add New Question</a>
</div>
<div id="app">
    <div id="question-section-0" class="my-2 drag-cursor clone-node" data-question="0">
        <div id="question-bar" class="p-2 the-bar">
            <div class="text-dark" id="function-btns">
                <h5 class="">This is question title</h5>
                <a class="btn btn-light btn-sm bg-primary text-light rounded-0" id="edit-question" onclick="editQuestion(this)">
                    <i class="fa fa-edit"></i>
                </a>
                <a class="btn btn-light btn-sm border border-dark rounded-0" id="copy-question" onclick="copyQuestion(this)">
                    <i class="fa fa-copy"></i>
                </a>
                <a class="btn btn-light btn-sm bg-danger text-light rounded-0" id="delete-question" onclick="removeQuestion(this)">
                    <i class="fa fa-trash"></i>
                </a>
            </div>
        </div>
        <div id="question-content-section" class="question-content">
            <div class="question py-2" id="question">
                <p>Question :</p>
                <textarea id="ask-question-0" class="question-textarea w-100 rounded-0"></textarea>
                <p class="py-2">Answer Type:</p>
                <div id="option-list" class="py-2">
                    <lable><input type="radio" id="typeone" name="quest-type" onchange="typeOneSelect()" value="1" >Question With Options</label>
                    <lable><input type="radio" id="typetwo" name="quest-type" onchange="typeTwoSelect()" value="2"> Question WithOut Options</label>
                    <lable><input type="radio" id="typethree" name="quest-type" onchange="typeThreeSelect()" value="3"> Question With Yes/No</label>
                </div>
                <div class="qs_with_op selectt" id="qs-op-0">
                    <p>Set This Question is With Options</p>
                    <a id="addop" onclick="addOptions(this);" class="btn btn-sm btn-primary rounded-0 test">
                        <i class="fa fa-plus"></i> Add option
                    </a>
                    <div class="option-text py-2" id="opfield-0">
                        <input class="w-50 rounded-0 inpwh-op" id="for-question-0-inpwh-op-0" data-for-question="0" name="" type="text"/>
                        <a id="removeop" onclick="removeOptions(this);" class="btn btn-sm bg-danger text-light rounded-0">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>     
                </div>
                <div class="qs_without_op selectt" id="qs_wht_op">
                    <p>Set This Question is WithOut Options</p>
                </div>
                <div class="qs_with_yn selectt" id="qs-yn-0">
                    <p>Set This Question is With Yes/No</p>
                    <a id="addopyn" onclick="addOptionsYn(this);" class="btn btn-sm btn-primary rounded-0"> 
                        <i class="fa fa-plus"></i> Add option
                    </a>
                    <div class="option-text-yn py-2" id="opfieldyn-0">
                        <input class="w-50 rounded-0 inpwh-yn" id="for-question-0-inpwh-yn-0" data-for-question="0" name="" type="text"/>
                        <a id="removeop" onclick="removeOptions(this);" class="btn btn-sm btn-light bg-danger text-light rounded-0">
                           <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-success btn-sm rounded-0">Save</a>
<script>
</script>
    

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