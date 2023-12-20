var bars = document.querySelector('.boxBars');

bars.addEventListener("click", function (){
    var back = document.querySelector('.back');
    back.classList.add('block');
    back.classList.remove('hidden');
});

var out_btn = document.querySelector('.out_btn');
 out_btn.addEventListener("click", function(){
    var back = document.querySelector('.back');
    back.classList.remove('block');
    back.classList.add('hidden');
 });