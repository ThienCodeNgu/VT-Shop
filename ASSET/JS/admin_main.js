var cate_btn = document.getElementById("btn_category");
var btn_plus = document.querySelector(".btn_plus");
var btn_minus = document.querySelector(".btn_minus");
var sub_function = document.querySelector(".sub_function_list");
var clickCount = 0;
cate_btn.addEventListener("click", function(){
    clickCount++;
    if (clickCount % 2 == 0){
        btn_plus.classList.remove('btn_icon_hide');
        btn_minus.classList.add('btn_icon_hide');
        sub_function.classList.add('btn_icon_hide');    
    }else {
        btn_plus.classList.add('btn_icon_hide');
        btn_minus.classList.remove('btn_icon_hide');
        sub_function.classList.remove('btn_icon_hide');
    }
});