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


// モーダル部分
// $(function () { //①
//   $('.modalopen').each(function () {
//     $(this).on('click', function () {
  
//       var target = $(this).data('target');
//       var modal = document.getElementById(target);
//       var content = $(this).data('content'); // クリックしたボタンの投稿内容
//       var post = $(this).attr('post');
//       var postId = $(this).attr('post_id'); // 編集する投稿のID

//       // モーダルを開き、投稿内容を表示
//       $(modal).fadeIn();
//       // このモーダル内にあるtextareaとhiddenを探してセットする
//       $(modal).find('.modal-textarea').val(post);
//       $(modal).find('.modal-post-id').val(postId);

//       return false;
//     });
//   });

//   // フォームを送信しつつモーダルを閉じる
//   $('.modalCloseBtnOnly').on('click', function () {
//     $(this).closest('.js-modal').fadeOut();
//   });

// });


$(function () {
  $('.modalopen').on('click', function (e) {
    e.preventDefault();

    // 開く対象のモーダルID
    const targetId = $(this).data('target');
    const modal = $('#' + targetId);

    // 投稿内容とIDを取得
    const post = $(this).data('post');
    const postId = $(this).data('post-id');

    // モーダル表示
    modal.fadeIn();

    // モーダル内に値をセット
    modal.find('.modal-textarea').val(post);
    modal.find('.modal-post-id').val(postId);
  });
   // モーダルの閉じるボタンで閉じる
  $('.modalCloseBtnOnly').on('click', function () {
    $(this).closest('.js-modal').fadeOut();
  });

  // ←★ここが追加部分：モーダルの外側をクリックで閉じる
  $(document).on('click', '.js-modal', function (e) {
    if ($(e.target).closest('.modal-inner').length === 0) {
      $(this).fadeOut();
    }
  });


  
});





