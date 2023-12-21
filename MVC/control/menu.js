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