$(function () {
	$(".trade_in li .xiaLa").click(function () {
		$(this).siblings().stop(false,true).slideToggle();
		$(this).find("span").stop(false,true).toggleClass("on");
	})

	$(".offer_inn li").click(function () {
		$(this).addClass("on").siblings().removeClass("on");
		$('.offer_in').eq($(".offer_inn li").index($(this))).css("display","block").siblings().css("display","none");
	})
	$(".visitor_in li").click(function () {
		$(this).addClass("on").siblings().removeClass("on");
		$('.caller_in').eq($(".visitor_in li").index($(this))).css("display","block").siblings().css("display","none");
	})	

})