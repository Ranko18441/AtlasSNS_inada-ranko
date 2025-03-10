$(document).ready(function() {
  $('.menu-btn').on('click', function() {
      // メニューを開閉する
      $('.menu').toggleClass('open');
      
      // ボタンの矢印を反転する
      $(this).toggleClass('show');
  });
});


  //JQueryはただで使えないので、JQueryの設定用の記述をしなければいけない




//   document.addEventListener('DOMContentLoaded', function() {
//     const menuBtn = document.querySelector('.menu-btn');
//     const menu = document.querySelector('.menu');

//     menuBtn.addEventListener('click', function() {
//         menu.classList.toggle('show'); // メニューの表示・非表示を切り替える
//     });
// });