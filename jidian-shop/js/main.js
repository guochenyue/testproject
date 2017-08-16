//下拉框
(function(){
    var num = 0;

    $('[data-toggle=arrowdown]').hover(function(){
        var _id = $(this).attr('id');
        num = _id.substring(5, _id.length);
        $(this).find('span')
            .removeClass('run-down')
            .addClass('run-up');
        $('#nav-box'+num).slideDown(100);
    }, function(){
        $(this).find('span')
            .removeClass('run-up')
            .addClass('run-down');
        $('#nav-box'+num).hide();
    });
    $('[data-toggle=hidden-box]').hover(function(){
        var _id =  $(this).attr('id');
        num = _id.substring(7, _id.length);
        $('#arrow'+num).addClass('nav-hover')
            .find('span').removeClass('run-down')
            .addClass('run-up');
        $(this).show();
    }, function(){
        $('#arrow'+num).removeClass('nav-hover')
            .find('span').removeClass('run-up')
            .addClass('run-down');
        setTimeout(function(){
            $('#arrow'+num).find('span').removeClass('run-down');
        }, 500);
        $(this).slideUp(100);
    });
})(jQuery);




//search-box
(function(){
    $('.search-box').hover(function(){
        $(this).find('span')
            .addClass('down-icon-circle').css({
                background: '#f50 url(img/arrow-white.png) no-repeat center'
            });
    }, function(){
        $(this).find('span')
            .removeClass('down-icon-circle').css({
                background: ''
            });
    });
})(jQuery);

//滚动出现固定导航
(function(){
    $(window).scroll(function(){
        var scTop = $(window).scrollTop(),
            $scS = $('.scroll-search'),
            $frS = $('.fix-right-sub'),
            rW;
        rW = ($(window).width() - 1190)/2;

        scTop >= 200 ? $scS.slideDown(200) : $scS.slideUp(200);
        if(scTop >= 2700 && scTop < 4400){
            $frS.css({position: 'fixed', top: '-541px', left: rW, marginTop: ''});
        }
        else if(scTop >= 4400){
            $frS.css({position: '', marginTop: 1728});
        }
        else{
            $frS.css({position: ''});
        }
    });
})(jQuery);

//sidebar
$(document).ready(function(){
	$(".side-li>li").mouseover(function(){
		$(this).addClass("se");
		}).mouseout(function(){
		$(this).removeClass("se");
		})
	$(".side-li li").hover(function(){
			$(this).children("ul").css("display","block");
		},function(){
			$(this).children("ul").css("display","none");
		}
	); 
	
});


//关二维码
(function(){
    $('.close-code').click(function(){
        $('.two-code').fadeOut(200);
    });
})();

//service
(function(){
    $('.service-cell').hover(function(){
        $(this).children('.service-i').find('img').animate({
            marginTop: '-10px'
        }, 100);
        $(this).children('.service-i').find('img').animate({
            marginTop: '6px'
        }, 100);
    }, function(){
        return false;
    });
})();
//product-box
(function(){
    $('.product-box').hover(function(){
        $(this).css({
            zIndex: '3000'
        });
    }, function(){
        $(this).css({
            zIndex: ''
        });
    });
})();


//product-show
(function(){
    $('.product-box').hover(function(){
        $(this).find('.share-weitao').fadeIn(200);
    }, function(){
        $(this).find('.share-weitao').fadeOut(200);
    });
})();

//dynamic
(function(){
    $('.dynamic').hover(function(){
        $(this).find('.follow').fadeIn(200);
    }, function(){
        $(this).find('.follow').fadeOut(200);
    })
})();

//more-btn
(function(){
    var flag = 1;

    $('.more-btn').click(function(){
        if(flag){
            $(this).css({
                background: '#f40 url(img/up.png) no-repeat 90% center'
            });
            $('.sub-nav').css({
                height: '145px'
            });
            flag = 0;
        }else{
            $('.sub-nav').css({
                height: ''
            });
            $(this).css({
                background: ''
            });
            flag = 1;
        }
    });
})();


/**
 * backToTop1
 */
$(document).ready(function(){
    $(window).scroll( function() {               //滚动时触发
        var top = $(document).scrollTop(),       //获取滚动条到顶部的垂直高度
            height = $(window).height();         //获得可视浏览器的高度
        if(top > 100){
            $("#backToTop1").show(200, function(){
                $("#backToTop1").css({
                    top: height + top - 100
                });
            });
        }
    });
    /*点击回到顶部*/
    $('#backToTop-up').click(function(){
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });
    /*点击到底部*/
    $('#backToTop-down').click(function(){
        $('html, body').animate({
            scrollTop: $(document).height()
        }, 500);
    });
});


//my-card
(function(){
    $('.arrow-right').click(function(){
        $('.cards-info ul').animate({
            marginLeft: '-205px'
        }, 500);
    });
    $('.arrow-left').click(function(){
        $('.cards-info ul').animate({
            marginLeft: '0'
        }, 500);
    });
})();

//msg-close
(function(){
    $('.close-msg').click(function(){
        $('.read-info').css({
            textAlign: 'center'
        }).html('还没有新的消息...');
    });
})();

//tab-nav
(function(){
    $('.li-nav').hover(function(){
        var _id, num;

        _id = $(this).attr('id');
        num = _id.substring(3, _id.length);
        $('.li-nav').removeClass('li-nav-hover');
        $('.hiddenBox').hide();
        $('#box-'+num).fadeIn(200);
    }, function(){
        $(this).addClass('li-nav-hover');
    });
})();

//service-cell
(function(){
    $('.service-cell[id]').hover(function(){
        var _id, num;

        _id = $(this).attr('id');
        num = _id.substring(8, _id.length);
        $('.service-box').css({
            bottom: -50
        }).hide();
        $('#service-box-'+num).show().animate({
            bottom: '0'
        }, 200);
        $('.service-cell[id]').css({
            borderBottomColor: ''
        });
        $(this).css({
            borderBottomColor: '#fff'
        });
    }, function(){

    });
})();

//close-service
(function(){
    $('.service-head > .fa-times').click(function(){
          $('.service-box').fadeOut(200);
    });
})();

//hidden-title
(function(){
    $('.hidden-title > a').hover(function(){
        $(this).next().css({
            color: '#f40'
        });
    }, function(){
        $(this).next().css({
            color: ''
        });
    });
})();









