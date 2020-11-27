// Adding Question
function addNewQuestion(){
    $("#question-content-section").hide();
    length = $(".clone-node").length
    var clone = $("#app .clone-node:last-child").clone();
    newId = "question-section-"+length;
    clone.attr("id", newId);
    $(clone).attr('data-question',length)
    clone.find(".question-textarea").attr("id","ask-question-"+length);
    clone.find(".inpwh-yn").attr("id","for-question-"+length+"-inpwh-yn-0").attr('data-for-question',length).val("");
    clone.find(".inpwh-op").attr("id","for-question-"+length+"-inpwh-op-0").attr('data-for-question',length).val("");
    $("#app").append(clone); 
}

// Edit Question Toggle
function editQuestion(e){
    var questioncontent = e.parentNode.parentNode.parentNode.getElementsByClassName("question-content")[0];
    $(questioncontent).toggle("slow");
}

// Copy Question
function copyQuestion(e){
    length = $(".clone-node").length
    var x = e.parentNode.parentNode.parentNode.id;
    let questionSection = document.getElementById(x);
    var clone = $(questionSection).clone();
    newId = "question-section-"+length;
    clone.attr("id", newId);
    $(clone).attr('data-question',length)
    clone.find(".question-textarea").attr("id","ask-question-"+length);
    clone.find(".inpwh-yn").attr("id","for-question-"+length+"-inpwh-yn-0").attr('data-for-question',length);
    clone.find(".inpwh-op").attr("id","for-question-"+length+"-inpwh-op-0").attr('data-for-question',length);
    $("#app").append(clone); 
}

// Delete Question 
function removeQuestion(e){
    e.parentNode.parentNode.parentNode.remove();
}

// Add option To Question
function addOptions(e){
    var parent = e.parentNode.id;
    var clone = $("#"+parent).clone(true);
    mainlength = $(".inpwh-yn").data("for-question");
    length = $(".option-text").length;
    newId = "opfield-"+length;
    clone.attr("id", newId);
    clone.find(".inpwh-op").attr("id","for-question-"+mainlength+"-inpwh-op-"+length).val("");
    $("#qs_op").append(clone);
}
function addOptionsYn(e){
    var parent = e.parentNode.id;
    var clone = $("#"+parent).clone(true);
    mainlength = $(".inpwh-yn").data("for-question")
    length = $(".option-text-yn").length;
    newId = "opfieldyn-"+length;
    clone.attr("id", newId);
    clone.find(".inpwh-yn").attr("id","for-question-"+mainlength+"-inpwh-yn-"+length).val("");
    $("#qs_yn").append(clone);
}

// Option Toggle
function typeOneSelect(){
    $('.qs_with_op').show();
    $('.qs_without_op').hide();
    $('.qs_with_yn').hide();
}
function typeTwoSelect(){
    $('.qs_with_op').hide();
    $('.qs_without_op').show();
    $('.qs_with_yn').hide();
}
function typeThreeSelect(){
    $('.qs_with_op').hide();
    $('.qs_without_op').hide();
    $('.qs_with_yn').show();
}


// Remove option function
function removeOptions(e){
    e.parentNode.remove();
}

// Drag And Drop UI 
$( "#app" ).sortable();
$( "#app" ).disableSelection();