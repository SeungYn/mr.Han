'use strict'
//사이드 메뉴 버튼
const sideMenuButton = document.querySelector('.sideMenu__button__on');
const sideMenuButtonClose = document.querySelector('.sideMenu__button__close');
const sideMenu = document.querySelector('.sideMenu');
const sideMenuInfo = document.querySelector('.sideMenu__info');

//사이드 버튼 open시
sideMenuButton.addEventListener('click',()=>{
  sideMenu.style.width="300px";
  sideMenu.style.flexDirection="column";
  sideMenuInfo.style.display="block";
  sideMenuButton.style.display="none";
  sideMenuButtonClose.style.display="block";
});

//사이드 버튼 close시
sideMenuButtonClose.addEventListener('click',()=>{
  sideMenu.style.width="40px";
  sideMenu.style.flexDirection="column-reverse";
  sideMenuInfo.style.display="none";
  sideMenuButton.style.display="block";
  sideMenuButtonClose.style.display="none";
});