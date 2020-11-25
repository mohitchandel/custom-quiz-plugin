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
    
    <div id="question">
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 
                        .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0
                        .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9
                        0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/>
                        </svg>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M3 6v18h18v-18h-18zm5 14c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 
                            .448 1 1v10zm5 0c0 .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm5 0c0
                            .552-.448 1-1 1s-1-.448-1-1v-10c0-.552.448-1 1-1s1 .448 1 1v10zm4-18v2h-20v-2h5.711c.9
                            0 1.631-1.099 1.631-2h5.315c0 .901.73 2 1.631 2h5.712z"/>
                        </svg>
                    </a>
                </div> 
            </div>
            <!-- <a class="btn btn-danger btn-sm remove" >Remove This Question</a> -->
        </div>
    </div>
    <script>

    // Add option function
    var i = 1;
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
    var removeBtn = document.getElementById('removeop');
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