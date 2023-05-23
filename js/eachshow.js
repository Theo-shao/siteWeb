;(function($){
    $.fn.extend({
        eachshpw : function(ael,sel,type,opts){
            if(type){
                $(this).mouseover(function(){
                        var _this = this;
                        ael.each(function(index){
                            if(ael.get(index) == _this){
                                 ael.eq(index).addClass('on');
                                 sel.eq(index).show();
                            }else{
                                ael.eq(index).removeClass('on');
                                sel.eq(index).hide();
                            }
                        })
                    })
            }else{
                $(this).click(function(){
                        var _this = this;
                        ael.each(function(index){
                            if(ael.get(index) == _this){
                                 ael.eq(index).addClass('on');
                                 sel.eq(index).stop().fadeIn();
                            }else{
                                ael.eq(index).removeClass('on');
                                sel.eq(index).hide();
                            }
                        })
                    })
            }
            
        }
    }); 
})(jQuery);