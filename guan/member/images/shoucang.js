$(function () {
	 // 我的收藏
    jQuery(".cakes_in .cakes_left1").slide({mainCell:".pd ul",autoPage:true,effect:"left",autoPlay:true,vis:4,interTime:4500});
    jQuery(".cakes_in .cakes_left2").slide({mainCell:".pd ul",autoPage:true,effect:"left",autoPlay:true,vis:4,interTime:5500});
	jQuery(".avocationin .avocation_inn").slide({mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:5,interTime:5500});
	jQuery(".sensein .sense_inn").slide({mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:5,interTime:4000});
   	$(".collect_in").eq(1).css("display","none");
    $(".cakes_in").eq(1).css("display","none");
	$(".order li").click(function () {
		$(this).addClass("on").siblings().removeClass("on");
		$('.make').eq($(".order li").index($(this))).css("display","block").siblings().css("display","none");
	})	
	$(".supervise_inn li").click(function () {
		$(this).addClass("on").siblings().removeClass("on");
		$('.supervise_in').eq($(".supervise_inn li").index($(this))).css("display","block").siblings().css("display","none");
	})
	$(".collect li").click(function () {
		$(this).addClass("on").siblings().removeClass("on");
		$('.collect_in').eq($(".collect li").index($(this))).css("display","block").siblings(".collect_in").css("display","none");
	})	
	$(".store_tit h2").click(function () {
		$(this).addClass("on").siblings().removeClass("on");
		$('.cakes_in').eq($(".store_tit h2").index($(this))).css("display","block").siblings().css("display","none");
	});		
    $(".follow_ss input").keyup(function(){
    	console.log(11);
        $(this).siblings('.cast').css("display","block");
    });
    
    $(".follow_ss").find("input").blur(function(){
       // $(".cast").css("display","none");
        $(".follow_ss input").removeClass("on");
    });
    // 验证手机邮箱

    function dblock(oclass) {
    	$(oclass).css("display","block");
    }
     $(".mailbox span").click(function () {
    	dblock(".mailbox_in");
    })   
    $(".cellphone span").click(function () {
    	dblock(".cellphone_in");
    })   
    $(".close1").click(function () {
    	$(this).parent().parent().parent().css("display","none");
    });
    (function (){
    	var len=0;
	    $(".amend_in li").each(function () {
	    	if ($(this).find("h2").hasClass("on")) {
	    		len++;
	    	}
	    })
	    $(".safe_level span").css("width",$(".safe_level").width()*len/4);
    })();
    $(".popup li").click(function () {
		var str="<li><i><img src='../images/zh_qux.png'></i><a href=''>新增</a></li>";
    	if ($(this).parents(".follow_lf").siblings(".follow_ri").find(".concern").find(".concernin").find("li").length<5) {
    		$(this).parents(".follow_lf").siblings(".follow_ri").find(".concern").find(".concernin").append(str);
    	}
    })
    $(".groom li").click(function () {
		var str="<li><i><img src='../images/zh_qux.png'></i><a href=''>新增</a></li>";
    	if ($(this).parents(".follow_lf").siblings(".follow_ri").find(".concern").find(".concernin").find("li").length<5) {
    		$(this).parents(".follow_lf").siblings(".follow_ri").find(".concern").find(".concernin").append(str);
    	}
    })
   
})