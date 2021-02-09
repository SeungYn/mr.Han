'use strict'
//사이드 메뉴 버튼
const sideMenuButton = document.querySelector('.sideMenu__button__on');
const sideMenuButtonClose = document.querySelector('.sideMenu__button__close');
const sideMenu = document.querySelector('.sideMenu');
const sideMenuInfo = document.querySelector('.sideMenu__info');
const sideMenuLogout = document.querySelector('.sideMenu__bottom a');

//사이드 버튼 open시
sideMenuButton.addEventListener('click',()=>{
  sideMenu.style.width="250px";
  sideMenuButton.style.display="none";
  sideMenuButtonClose.style.display="block";
  sideMenuLogout.style.display="block";
  setTimeout(()=>{sideMenuInfo.style.display="block";sideMenu.style.flexDirection="column";}
  ,200);
});

//사이드 버튼 close시
sideMenuButtonClose.addEventListener('click',()=>{
  sideMenu.style.width="40px";
  sideMenu.style.flexDirection="column-reverse";
  sideMenuInfo.style.display="none";
  sideMenuButton.style.display="block";
  sideMenuButtonClose.style.display="none";
});

