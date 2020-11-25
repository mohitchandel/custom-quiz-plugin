var i = 1;

// Adding Question
function addNewQuestion(){
    var app = document.getElementById("app");
    var addQues = app.lastElementChild;
    if (document.body.contains(addQues)){
        var clone = addQues.cloneNode(true);
        clone.setAttribute('data-question', ++i);
        clone.id = "question-section-" + ++i;
        addQues.parentNode.appendChild(clone);
    }
}

// Edit Question Toggle
function editQuestion(e){
    var questioncontent = e.parentNode.parentNode.parentNode.getElementsByClassName("question-content")[0];;
    $(questioncontent).toggle("slow");
}

// Copy Question
function copyQuestion(){
    let questionSection = document.getElementById("question-section-1");
    let clone = questionSection.cloneNode(true);
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
