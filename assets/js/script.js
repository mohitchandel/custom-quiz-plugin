// Adding Question
function addNewQuestion(){
    $("#question-content-section").hide();
    length = $(".clone-node").length
    var clone = $("#app .clone-node:last-child").clone();
    newId = "question-section-"+length;
    clone.attr("id", newId);
    $(clone).attr('data-question',length)
    clone.find("#ask-question-0").attr("id","ask-question-"+length);
    $("#app").append(clone); 
}

// Edit Question Toggle
function editQuestion(e){
    var questioncontent = e.parentNode.parentNode.parentNode.getElementsByClassName("question-content")[0];
    $(questioncontent).toggle("slow");
}

// Copy Question
function copyQuestion(e){
    let x = e.parentNode.parentNode.parentNode.id;
    let questionSection = document.getElementById(x);
    let clone = questionSection.cloneNode(true);
    length = $(".clone-node").length
    clone.setAttribute('data-question', length);
    clone.id = "question-section-" + length;
    questionSection.parentNode.appendChild(clone);
}

// Delete Question 
function removeQuestion(e){
    e.parentNode.parentNode.parentNode.remove();
}

// Add option To Question
function addOptions(){
    let optionField = document.getElementById("opfield");
    var clone = optionField.cloneNode(true);
    clone.id = "opfield-" + ++i;
    clone.getElementsByTagName("input")[0].value ="";
    optionField.parentNode.appendChild(clone);
    var opfldParent = document.getElementById(clone.id).parentNode.parentNode
    var opfldParentId = opfldParent.id
    var mainParent = document.getElementById(opfldParentId).getElementsByTagName('textarea')[0];
    clone.getElementsByTagName('input')[0].id = mainParent.id+"-inpwh-op-" + i;
}
function addOptionsYn(e){
    let theClone = e.parentNode;
    var clone = theClone.cloneNode(true);
    length = $(".clone-node").length
    clone.getElementsByTagName('input')[0].id = "ask-question-"+length+"-inpwh-yn-" + ++i;
    clone.getElementsByTagName("input")[0].value ="";
    theClone.parentNode.appendChild(clone);
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