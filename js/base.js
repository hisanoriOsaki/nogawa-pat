//ハンバーガーメニュー開閉
$(function() {
var $body = $('body');
$('.menu-trigger').on('click', function() {
$body.toggleClass('open-menu');
});
$('.open-menu .menu-trigger ,.close-btn ,.contents').on('click', function() {
$body.removeClass('open-menu');
});

$(".toggle_nav").on("click", function() {
var windowWidth = document.documentElement.clientWidth;
if (windowWidth <= 989) {
$(this).parent().next().slideToggle();
if ($(this).hasClass('active')) {			
	$(this).removeClass('active');				
}
else {
	$(this).addClass('active');			
}
}
});
	
//smoothscroll
$('a[href^="#"]').click(function() {
var speed = 400; // スクロールの速度
var href = $(this).attr("href");
var target = $(href == "#" || href == "" ? 'html' : href);
var position = target.offset().top;
// スムーススクロール
$('body,html').animate({
	scrollTop: position
}, speed, 'swing');
return false;
});
});

var scrollStart = $('#top').offset().top;
$(window).scroll(function(){
distance = $(this).scrollTop();
if (scrollStart + 5 <= distance) {
$('#top').addClass('sticky');
} else {
$('#top').removeClass('sticky');
}
});

$(window).on('scroll', function() {
var start = $("#access-start");
start.each(function() {
var elemOffset = $(this).offset().top;
var end = $("#footer").offset().top;
var scrollPos = $(window).scrollTop();
var wh = $(window).height();
if (scrollPos > elemOffset - wh + 100 && scrollPos < end - wh + 100 ) {
	$(".access").fadeIn();

} else {
	$(".access").fadeOut();
}
});
});
$(".fixed-btn").click(function() {
$(".toggle").slideToggle();
$(this).toggleClass("open");
});
