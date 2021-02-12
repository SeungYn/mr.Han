'use strict'

//한준영 슬라이드 부분
var han_slide = document.getElementById('han__slide');
var han_slide_items = han_slide.getElementsByTagName('li');
var next_btn = document.querySelector('.next');
var prew_btn = document.querySelector('.prew');
var han_slide_current_index = 0;
var han_slide_items_count = han_slide_items.length;
var move_px = 600;
var now_px = 0;

next_btn.addEventListener('click',()=>{
  next(han_slide_current_index);
});

prew_btn.addEventListener('click',()=>{
  prew(han_slide_current_index);
});

function next(index){
  if(han_slide_current_index < han_slide_items_count-1){
    han_slide.style.left= -move_px*(index+1) + "px";
    now_px = -move_px*(index+1);
    han_slide_current_index++;
  }
}

function prew(index){
  if(han_slide_current_index > 0){
    now_px += move_px;
    han_slide.style.left= now_px + "px";
    han_slide_current_index--;
  }
}