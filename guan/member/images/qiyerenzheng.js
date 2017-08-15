$(function () {
	$(".submit_tit div input").click(function () {
		$('.submits').eq($(".submit_tit div input").index($(this))).css("display","block").siblings().css("display","none");
	})
})