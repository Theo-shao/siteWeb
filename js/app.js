jQuery(document).ready(function() {

    $.fn.placeholder = function(options) {
        var opts = $.extend({}, $.fn.placeholder.defaults, options);
        var isIE = document.all ? true : false;
        return this.each(function() {
            var _this = this,
                placeholderValue = _this.getAttribute("placeholder"); //缓存默认的placeholder值
            if (isIE) {
                _this.setAttribute("value", placeholderValue);
                _this.onfocus = function() {
                    $.trim(_this.value) == placeholderValue ? _this.value = "" : '';
                };
                _this.onblur = function() {
                    $.trim(_this.value) == "" ? _this.value = placeholderValue : '';
                };
            }
        });
    };

    $("input").placeholder();


	$(".fullSlide .bd li").height($(window).height());

    $(window).resize(function(){

    if($(window).height()<750){
      $(".fullSlide .bd li,.fullSlide .bd ul,.fullSlide").height($(window).height());
    }
    })
    $(".fullSlide").slide({
        titCell: ".hd ul",
        mainCell: ".bd ul",
        effect: "fold",
        autoPlay: true,
        autoPage: true,
        trigger: "click"
    });

$('.picScroll li a').hover(function(){
    $(this).children('.event_text').stop().fadeIn(300);
    alert
},function(){
    $(this).children('.event_text').stop().fadeOut(300);
});

if ($('.video').length) {
    $('.video').magnificPopup({
        type: 'iframe'
    });
}


/*$('#place').focus(function(){
    $('.sug').show();
});*/

$('.Side_top,.scrTop').click(function(){
    $('body,html').stop().animate({
        scrollTop:0
    })
});

$('.Side_weixin').hover(function(){
    $('.Side_weixin_b').show()
},function(){
    $('.Side_weixin_b').hide()
});

$('.mapImg').click(function(){
    $('body,html').stop().animate({
     scrollTop:$('#main').offset().top
     })
});
$('#Date_a,#Date_b').mousedown(function(){
    $('.kucity').hide();
});


$('#place').click(function(){
        $('.kucity').click(function(){
            if($('.kucity').height()-($(window).height()-($('.kucity').offset().top - $('body,html').scrollTop())) > 0){
            $('body,html').stop().animate({
             scrollTop:$('body,html').scrollTop()+$('.kucity').height()-($(window).height()-($('.kucity').offset().top - $('body,html').scrollTop())-20)
             })
            }
        })
       if($('.kucity').height()-($(window).height()-($('.kucity').offset().top - $('body,html').scrollTop())) > 0){
           $('body,html').stop().animate({
            scrollTop:$('body,html').scrollTop()+$('.kucity').height()-($(window).height()-($('.kucity').offset().top - $('body,html').scrollTop())-20)
            })
       }

})

$('.show-v').click(function(){
    if($(this).attr('data-sh')){
        $(this).next('.list-screen').children('.hd').show(); 
        $(this).attr('data-sh','').addClass('on');
    }else{
        $(this).next('.list-screen').children('.hd').hide();
        $(this).attr('data-sh','1').removeClass('on');
    }
});

$('.more-sr').click(function(){
    $(this).prevAll('ul').children('.hd').show();
    $(this).hide();
});

$('.remove-sr').click(function(){
    $(this).parent().remove();
});



/*跟随漂浮*/
$.fn.smartFloat = function(tf) {
    var position = function(element) {
        var top = element.position().top, pos = element.css("position");
        $(window).scroll(function() {
        if(tf){
            
                var scrolls = $(this).scrollTop();
                if ((scrolls - top)>0) {

                    if (window.XMLHttpRequest) {
                        element.css({
                            position: "fixed",
                            top: 0
                        }); 
                    } else {
                        element.css({
                            top: scrolls
                        }); 
                    }
                }else {
                    element.css({
                        position: pos,
                        top: top
                    }); 
                }
           
        }else{
            element.css({
                position: 'static'
            }); 
        }

        });
};
    return $(this).each(function() {
        position($(this));                       
    });
};
if($('.check_labelditu').hasClass('on')){
    $('.ditufixed').smartFloat(true);
}

var ditu = true;

$('.check_labelditu').click(function(){
    if($('.check_labelditu').hasClass('on')){
        $('.ditufixed').smartFloat(true);
         //    $('#ditu').slideUp();
         // ditu = false;
        // $('.hd-ditu').children('b').html('展开地图');
    }else{
        $('.ditufixed').smartFloat(false);
            $('.ditufixed').css({
                position: 'static'
            }); 
        // $('#ditu').slideDown();
        //  ditu = true;
        // $('.hd-ditu').children('b').html('收起地图');

    }

});

$('.hd-ditu').click(function(){
    if(ditu){
        $(this).children('b').html('展开地图');
        $('#ditu').slideUp();
        ditu = false;
    }else{
        $(this).children('b').html('收起地图');
        $('#ditu').slideDown();
        ditu = true;
    }

});

$('.drop-down').click(function(){
    var input = $(this).children('input'); 
    var span = $(this).children('span'); 
    var _this = $(this);
    var dropMask = _this.children('.drop-Mask');
    if(_this.hasClass('on')){
        _this.removeClass('on').children('.down-c').hide();
        _this.children('.down-c').children('li').unbind('click');
        dropMask.hide();

    }else{
        _this.addClass('on').children('.down-c').show();
        _this.children('.down-c').children('li').click(function(){
            span.text($(this).children('a').text())
            input.val($(this).children('a').text())
        })
        dropMask.show();
    }
});

$('td.more a').click(function(){
    if($(this).hasClass('on')){
        $(this).prevAll('.more-c').slideUp();
        $(this).removeClass('on');
        $(this).children('span').text('查看详情');
    }else{
        $(this).prevAll('.more-c').slideDown();
        $(this).addClass('on');
        $(this).children('span').text('收起');
    }
});

$('.other-l .more').click(function(){
    if(!$(this).hasClass('on')){
        $(this).prevAll('table').children('tbody').children('.hd').show()
        $(this).addClass('on')
    }else{
        $(this).prevAll('table').children('tbody').children('.hd').hide()
        $(this).removeClass('on')
    }
});


$('.modify-form').click(function(){
    if(!$(this).hasClass('hd')){
        $('.other-r-c table').eq(1).show();
        $('.other-r-c table').eq(0).hide();
        $(this).addClass('hd'); 
    }
});

$('#modify-btn').click(function(){
    $('.guest-name').text($('#guest-name').val());
    $('.guest-email').text($('#guest-email').val());
    $('.guest-tel').text($('#guest-tel').val());
    $('.male').text($('#male').val());
    $('.female').text($('#female').val());
    $('.other-r-c table').eq(0).show();
    $('.other-r-c table').eq(1).hide();
    $('.modify-form').removeClass('hd'); 
});

$('.distribution-mode-info-i').hover(function(){
    $('.distribution-mode-info').stop().fadeIn(200);
},function(){
    $('.distribution-mode-info').stop().fadeOut(200);
});

$('.reAdd .more').click(function(){
    $(this).prevAll('ul').children('.hd').show();
    $(this).remove();
})
$('.reAddList li').click(function(){
    var _this = this;
    $('.reAddList li').each(function(index){
        if( $('.reAddList li').get(index)==_this){
            $('.reAddList li').eq(index).children('span').addClass('on');
        }else{
            $('.reAddList li').eq(index).children('span').removeClass('on');
        }
    })
})

$('.membership-select-t a').click(function(){
    $('.vip-login').show();
    $(this).remove();
});


$('.my-collection-item > li').click(function(){
    if($(this).find('input').attr('checked')){
        $(this).find('input').removeAttr('checked');
        $(this).find('b').removeClass('on');
    }else{
        $(this).find('input').attr('checked','true');
        $(this).find('b').addClass('on');
       
    }
})
$('.wode-dianping-list-btn').click(function(){
    if($(this).parent().nextAll('.tianxie-pingjia').css('display')!='none'){
        $(this).parent().nextAll('.tianxie-pingjia').hide();
        $(this).text('点击评论');
    }else{
        $(this).parent().nextAll('.tianxie-pingjia').show();
        $(this).text('收起评论');

    }
});

$('.binding-list').find('.show-btn').click(function(){
    
    if( $(this).parent().nextAll('.binding-list-text').css('display')!='none'){
        $(this).parent().nextAll('.binding-list-text').hide();
        $(this).text('展开');
    }else{
         $(this).parent().nextAll('.binding-list-text').show();
        $(this).text('收起');

    }
});

$('.volume-show-btn').click(function(){
    
    if($(this).prevAll('.hd').css('display') !='none'){
        $(this).prevAll('.hd').hide();
        $(this).removeClass('on').children('span').text('查看详情');
    }else{
        $(this).prevAll('.hd').show(); 
        $(this).addClass('on').children('span').text('收起');
    }

});

$('.reservation-item-title-btn').click(function(){
    
    if($(this).parent().nextAll('.reservation-item-con').css('display') != 'none'){
        $(this).parent().nextAll('.reservation-item-con').hide();
        $(this).removeClass('on').children('b').text('展开');
    }else{
        $(this).parent().nextAll('.reservation-item-con').show();
        $(this).addClass('on').children('b').text('收起');
    }
});

$('.book-aboard').click(function(){
    var html = '<iframe id="iframe_js" src="https://affiliates.hihostels.com/search-box?lang=E&nobheader=Y" style="width:100%;height:100%;"></iframe>'
    $('.overseas-login').fadeIn(100);
    $('.overseas-login').append(html);
    $('#iframe_js').load(function(){
      $('.iframe-load').remove();
    });
});

$('.close-overseas-login').click(function(){
    $('.overseas-login').fadeOut(100);
})



// $.cookie('cookieName', {a:1});
// alert( $.cookie("cookieName")) '
// 
// 
// 
/*
var supplyArr;
var shtml2='';

Array.prototype.remove = function(val) {
var index = this.indexOf(val);
if (index > -1) {
this.splice(index, 1);
}
};

if($.cookie('supply')){
    alert($.cookie('supply'));
     for(var i = 0; i<$.cookie('supply').split("|").length;i++){
         shtml2+='<p class="clearfix">'+
     '<span class="fl s1">'+JSON.parse($.cookie('supply').split("|")[i]).name+'</span>'+
     '<span class="fr s2">1 × '+JSON.parse($.cookie('supply').split("|")[i]).val+'</span>'+
    '</p>';
     }
      $('.zaocang').html(shtml2);

    supplyArr = $.cookie('supply').split("|");
}else{
    supplyArr = [];
}
$('.supply-list li').click(function(){
    if(!$(this).hasClass('on')){
        $(this).addClass('on');
        var 
         var str = JSON.stringify({name:$(this).children('.atext').text(),val:$(this).children('span').text()})
        supplyArr.push(str);
        alert(supplyArr)
        var s1 = supplyArr.join('|');
        $.cookie('supply',s1); 
        var s2 = $.cookie('supply');
        var s3 = JSON.parse(s2.split("|")[0]); 
        //alert(s3.name)
        
       //alert(html)
        var shtml='';

        for(var i = 0; i<s2.split("|").length;i++){
            shtml+='<p class="clearfix">'+
        '<span class="fl s1">'+JSON.parse(s2.split("|")[i]).name+'</span>'+
        '<span class="fr s2">1 × '+JSON.parse(s2.split("|")[i]).val+'</span>'+
       '</p>';
        }



        $('.zaocang').html(shtml);
       // alert(s2.split("|").length)

    }else{
        $(this).removeClass('on')
    }
});*/





/*function cookiefn(el1,el2){
    var idArr = [];
    el1.each(function(index){
        if(el1.eq(index).attr('id')==$.cookie(el1.eq(index).attr('id'))){
                 el2.html(el2.html()+'<p class="clearfix" id='+$(this).attr('id')+'>'+
             '<span class="fl s1">'+$(this).children('.atext').text()+'</span>'+
             '<span class="fr s2">1 × '+$(this).children('span').text()+'</span>'+
            '</p>');
                $(this).addClass('on');
        }
    })


    el1.click(function(){
        if(!$(this).hasClass('on')){
                $(this).addClass('on');
                $(this).children('.atext').text();
                $(this).children('span').text();
                el2.html(el2.html()+'<p class="clearfix" id='+$(this).attr('id')+'>'+
            '<span class="fl s1">'+$(this).children('.atext').text()+'</span>'+
            '<span class="fr s2">1 × '+$(this).children('span').text()+'</span>'+
           '</p>');
            idArr.push($(this).attr('id')); 
            for(var i=0;i<idArr.length;i++){
                $.cookie(idArr[i],idArr[i]);

            }
            }else{
                $(this).removeClass('on');
                $.cookie( $(this).attr('id'), null); 
                $('p#'+$(this).attr('id')).remove();
            }
    })
}

cookiefn($('.supply-list li'),$('.zaocang'));
*/

/*
var ticketsArr = [];




$('.tickets-input').each(function(index){
  //  alert($.cookie($('.tickets-input').eq(index).attr('id')))
    if($.cookie($('.tickets-input').eq(index).attr('id'))==$('.tickets-input').eq(index).attr('id')){
        var _this = $(this).prevAll('span');
     //   alert($.cookie($('.tickets-input').eq(index).attr('id')))
        $('.tickets-box').html($('.tickets-box').html()+'<p class="clearfix" id='+$(this).attr('id')+'>'+
         '<span class="fl s1">'+$(this).parent().parent().prevAll('.name').text()+'</span>'+
         '<span class="fr s2">'+_this.text()+' × '+$(this).parent().parent().nextAll('.jg').text()+'</span>'+
        '</p>');

    }

});
*/
/*$('.tickets-input').click(function(){
    var _this = $(this).prevAll('span');
    if(!$(this).hasClass('on')){
        $('.tickets-box').html($('.tickets-box').html()+'<p class="clearfix" id='+$(this).attr('id')+'>'+
         '<span class="fl s1">'+$(this).parent().parent().prevAll('.name').text()+'</span>'+
         '<span class="fr s2">'+_this.text()+' × '+$(this).parent().parent().nextAll('.jg').text()+'</span>'+
        '</p>');
        $(this).addClass('on');
        ticketsArr.push($(this).attr('id'));
         // +','+_this.text()
    }else{
        $('p#'+$(this).attr('id')).html('<span class="fl s1">'+$(this).parent().parent().prevAll('.name').text()+'</span>'+'<span class="fr s2">'+_this.text()+' × '+$(this).parent().parent().nextAll('.jg').text()+'</span>')
    }



    for(var i=0;i<ticketsArr.length;i++){
        $.cookie(ticketsArr[i],ticketsArr[i]);
       // alert($.cookie(ticketsArr[i]).split(','))
        if($.cookie(ticketsArr[i]) == $(this).attr('id')){

        }else{

        }

    }


})*/


})
