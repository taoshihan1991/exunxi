/*
易迅息js文件
@author 陶士涵
*/
$(function(){

	$('.list-tweet li').hover(function(){
		$('.list-tweet li').removeClass('eat-me');
		$(this).addClass('eat-me');
	})

	$('.excerpt').hover(function(){
		$('.excerpt').removeClass('cur');
		$(this).addClass('cur');
	})
})