import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


$(function() {
    $('.menu-btn').on('click', function () {
      $('.menu').toggleClass('show'); // メニューの表示・非表示を切り替える
    });
  });