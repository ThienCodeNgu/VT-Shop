var bar = document.querySelector('.boxBars');
bar.addEventListener("click", function(){
    var back = document.querySelector('.back');
    back.classList.add('show');
    back.classList.remove('hidden');
})
var close_btn = document.querySelector('.close_btn');
close_btn.addEventListener("click", function(){
    var back = document.querySelector('.back');
    back.classList.remove('show');
    back.classList.add('hidden');
})

// var add_feedback_btn = document.querySelector('.add_feedback_btn');
// add_feedback_btn.addEventListener("click", function(){
//     var user_feedback_form = document.querySelector('.user_feedback');
//     user_feedback_form.classList.add('show');
//     user_feedback_form.classList.remove('hidden');
// });
var count_click = 0;
function open_feedback_form() {
    if (count_click % 2){
        var user_feedback_form = document.querySelector('.user_feedback');
        user_feedback_form.classList.remove('show');
        user_feedback_form.classList.add('hidden');
    }else {
        var user_feedback_form = document.querySelector('.user_feedback');
        user_feedback_form.classList.add('show');
        user_feedback_form.classList.remove('hidden');
    }
    count_click++;
}

var count_click_edit = 0;
var edit_btn = document.querySelector('.edit_btn');

edit_btn.addEventListener("click", function(){
    var edit_form = document.querySelector('.edit_form');
    if (count_click_edit % 2){
        edit_form.classList.remove('show');
        edit_form.classList.add('hidden');
    }else {
        edit_form.classList.add('show');
        edit_form.classList.remove('hidden');
    }
    count_click_edit++;
    
});