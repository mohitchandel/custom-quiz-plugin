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
        <a class="btn btn-dark">Add New Question</a>
    </div> 
    <div id="question-section-1" class="my-2" data-question="1">
        <div id="question-bar" class=" bg-dark p-2">
            <div class="text-light">
                <a class="btn btn-light btn-sm" id="edit-question" onclick="editQuestion()">edit</a>
                <a class="btn btn-light btn-sm" onclick="copyQuestion()">copy</a>
                <a class="btn btn-light btn-sm" onclick="removeQuestion(this)">delete</a>
                <span>This is question title</span>
            </div>
        </div>
        <div id="question-content-section" class="question-content">
            <div class="question py-2" id="question">
                <p>Question :</p>
                <textarea class="question-textarea w-100"></textarea>
                <p class="py-2">Answer Type:</p>
                <div id="option-list" class="py-2">
                    <lable><input type="radio" id="typeone" name="quest-type" value="1" >Question With Options</label>
                    <lable><input type="radio" id="typetwo" name="quest-type" value="2"> Question WithOut Options</label>
                    <lable><input type="radio" id="typethree" name="quest-type" value="3"> Question With Yes/No</label>
                </div>
                <div class="qs_with_op selectt">
                    <p>Set This Question is With Options<p>
                    <a id="addop" onclick="addOptions();" class="btn btn-sm btn-success">Add option</a>
                    <div class="option-text py-2" id="opfield">
                        <input class="w-50" id="inp-op" name="" type="text"/>
                        <a id="removeop" onclick="removeOptions(this);" class="btn btn-sm btn-light">
                            remove
                        </a>
                    </div>     
                </div>
                <div class="qs_without_op selectt" >
                    <p>Set This Question is WithOut Options<p>
                </div>
                <div class="qs_with_yn selectt" >
                    <p>Set This Question is With Yes/No<p>
                    <a id="addoptwo" onclick="addOptionstwo();" class="btn btn-sm btn-success">Add option</a>
                    <div class="option-text py-2" id="opfieldtwo">
                        <input class="w-50" id="inp-optwo" name="" type="text"/>
                        <a id="removeop" onclick="removeOptions(this);" class="btn btn-sm btn-light">
                            remove
                        </a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <script>

    // Edit Question Toggle
    $(".question-content").hide();
    function editQuestion(){
        $("#question-content-section").toggle();
    }

    // Copy Question
    var i = 1;
    function copyQuestion(){
        let questionSection = document.getElementById("question-section-1");
        var clone = questionSection.cloneNode(true);
        clone.setAttribute('data-question', ++i);
        clone.id = "question-section-" + ++i;
        questionSection.parentNode.appendChild(clone);
    }

    // Remove Question function
    function removeQuestion(e){
        e.parentNode.parentNode.parentNode.remove();
    }

    // Add option function
    function addOptions(){
        let optioField = document.getElementById("opfield");
        var clone = optioField.cloneNode(true);
        clone.id = "opfield" + ++i;
        clone.getElementsByTagName('input')[0].id = "inp-op" + i;
        clone.getElementsByTagName("input")[0].value ="";
        optioField.parentNode.appendChild(clone);
    }
    function addOptionstwo(){
        let optioField = document.getElementById("opfieldtwo");
        var clone = optioField.cloneNode(true);
        clone.id = "opfieldtwo" + ++i;
        clone.getElementsByTagName('input')[0].id = "inp-optwo" + i;
        clone.getElementsByTagName("input")[0].value ="";
        optioField.parentNode.appendChild(clone);
    }

    // Remove option function
    function removeOptions(e){
        e.parentNode.remove();
    }
    
    // Choose Question Type function
    $('.selectt').hide();
    document.getElementById('typeone').onchange = function(){
        $('.qs_with_op').show();
        $('.qs_without_op').hide();
        $('.qs_with_yn').hide();
    }
    document.getElementById('typetwo').onchange = function(){
        $('.qs_with_op').hide();
        $('.qs_without_op').show();
        $('.qs_with_yn').hide();
    }
    document.getElementById('typethree').onchange = function(){
        $('.qs_with_op').hide();
        $('.qs_without_op').hide();
        $('.qs_with_yn').show();
    }
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