(function() {

    'use strict';

})();

// smooth scroll
var smoothscroll = function smoothscroll(position, speed) {
    jQuery('body,html').animate({
        scrollTop: position
    }, speed, 'easeOutExpo');
};
jQuery('a[href^="#"]').on('click', function() {
    var s = 1000; // ミリ秒
    var href = jQuery(this).attr('href');
    var target = jQuery(href == "#" || href == "" ? 'html' : href);
    var p = target.offset().top;
    smoothscroll(p, s);
    return false;
});

jQuery(function() {
    jQuery('.hamburger').click(function() {
        jQuery(this).toggleClass('active');
        jQuery('.grobalNav').toggleClass('active');
        jQuery('.sp-hamburger-is-open').toggleClass('active');
    })
});

// // スクロールしたら表示
// //pagetop
// jQuery(function() {
//     var showComp = $('.show');
//     showComp.hide();
//     //スクロールが100に達したらボタン表示
//     jQuery(window).scroll(function() {
//         if (jQuery(this).scrollTop() > 100) {
//             //表示方法
//             showComp.fadeIn();
//         } else {
//             //非表示方法
//             showComp.fadeOut();
//         }
//     });
// });

//
// // キービジュアルスライド
// var keyV1 = $('.js-keyvisual-1');
// var keyV2 = $('.js-keyvisual-2');
// var keyV3 = $('.js-keyvisual-3');
// jQuery(function() {
//     setInterval(function() {
//         if (jQuery(keyV1).hasClass("is-prev")) {
//             jQuery(keyV1).addClass("is-next");
//             jQuery(keyV1).removeClass("is-prev");
//         } else if (jQuery(keyV1).hasClass("is-active")) {
//             jQuery(keyV1).addClass("is-prev");
//             jQuery(keyV1).removeClass("is-active");
//         } else if (jQuery(keyV1).hasClass("is-next")) {
//             jQuery(keyV1).addClass("is-active");
//             jQuery(keyV1).removeClass("is-next");
//         }
//         if (jQuery(keyV2).hasClass("is-prev")) {
//             jQuery(keyV2).addClass("is-next");
//             jQuery(keyV2).removeClass("is-prev");
//         } else if (jQuery(keyV2).hasClass("is-active")) {
//             jQuery(keyV2).addClass("is-prev");
//             jQuery(keyV2).removeClass("is-active");
//         } else if (jQuery(keyV2).hasClass("is-next")) {
//             jQuery(keyV2).addClass("is-active");
//             jQuery(keyV2).removeClass("is-next");
//         }
//         if (jQuery(keyV3).hasClass("is-prev")) {
//             jQuery(keyV3).addClass("is-next");
//             jQuery(keyV3).removeClass("is-prev");
//         } else if (jQuery(keyV3).hasClass("is-active")) {
//             jQuery(keyV3).addClass("is-prev");
//             jQuery(keyV3).removeClass("is-active");
//         } else if (jQuery(keyV3).hasClass("is-next")) {
//             jQuery(keyV3).addClass("is-active");
//             jQuery(keyV3).removeClass("is-next");
//         }
//     }, 5000);
// });
