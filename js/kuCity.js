/*
 * 城市选择jquery插件
 *
 * Licensed under the MIT license:
 * https://github.com/callmeJozo/kuCity
 *
 * Author: Naraku(http://segmentfault.com/u/naraku_)
 *
 * Version:  1.0
 *
 */

(function($) {
    //可以在allCities里面添加城市
	var allCities =["\u5317\u4eac\u5e02|Beijing|bjs","\u5929\u6d25\u5e02|Tianjin|tjs","\u547c\u4f26\u8d1d\u5c14|Hulunbuir|hlbe","\u5409\u6797|Jilin|jl","\u5ef6\u8fb9\u671d\u9c9c\u65cf\u81ea\u6cbb\u5dde|Yanbian|ybcxzzzz","\u54c8\u5c14\u6ee8|Harbin|heb","\u5927\u5174\u5b89\u5cad\u5730\u533a|GreatKhingan|dxaldq","\u4e0a\u6d77\u5e02|Shanghai|shs","\u65e0\u9521|Wuxi|wx","\u82cf\u5dde|Suzhou|sz","\u76d0\u57ce|Yancheng|yc","\u9547\u6c5f|Zhenjiang|zj","\u676d\u5dde|Hangzhou|hz","\u5b81\u6ce2|Ningbo|nb","\u6e29\u5dde|Wenzhou|wz","\u821f\u5c71|Zhoushan|zs","\u5408\u80a5|Hefei|hf","\u9ec4\u5c71|Huangshan|hs","\u5ba3\u57ce|Xuancheng|xc","\u798f\u5dde|Fuzhou|fz","\u666f\u5fb7\u9547|Jingdezhen|jdz","\u6d4e\u5b81|Jining|jn","\u5a01\u6d77|Weihai|wh","\u5b89\u9633|Anyang|ay","\u6b66\u6c49|Wuhan|wh","\u8861\u9633|Hengyang|hy","\u90b5\u9633|Shaoyang|sy","\u5f20\u5bb6\u754c|Zhangjiajie|zjj","\u5e7f\u5dde|Guangzhou|gz","\u6df1\u5733|Shenzhen|s","\u73e0\u6d77|Zhuhai|zh","\u6f6e\u5dde|Chaozhou|cz","\u6842\u6797|Guilin|gl","\u6d77\u53e3|Haikou|hk","\u4e09\u4e9a|Sanya|sy","\u6210\u90fd|Chengdu|cd","\u7ef5\u9633|Mianyang|my","\u4e50\u5c71|Leshan|ls","\u963f\u575d\u85cf\u65cf\u7f8c\u65cf\u81ea\u6cbb\u5dde|Aba|abczqzzzz","\u7518\u5b5c\u85cf\u65cf\u81ea\u6cbb\u5dde|Garze|gzczzzz","\u51c9\u5c71\u5f5d\u65cf\u81ea\u6cbb\u5dde|Liangshan|lsyzzzz","\u9ed4\u4e1c\u5357\u82d7\u65cf\u4f97\u65cf\u81ea\u6cbb\u5dde|Qiandongnan|qdnmzdzzzz","\u6606\u660e|Kunming|km","\u4e3d\u6c5f|Lijiang|lj","\u7ea2\u6cb3\u54c8\u5c3c\u65cf\u5f5d\u65cf\u81ea\u6cbb\u5dde|Honghe|hhhnzyzzzz","\u5927\u7406\u767d\u65cf\u81ea\u6cbb\u5dde|Dali|dlbzzzz","\u8fea\u5e86\u85cf\u65cf\u81ea\u6cbb\u5dde|Diqing|dqczzzz","\u62c9\u8428|Lhasa|ls","\u6797\u829d\u5730\u533a|Nyingchi|lzdq","\u897f\u5b89|Xian|xa","\u5609\u5cea\u5173|Jiayuguan|jyg","\u7518\u5357\u85cf\u65cf\u81ea\u6cbb\u5dde|Gannan|gnczzzz","\u897f\u5b81|Xining|xn","\u94f6\u5ddd|Yinchuan|yc","\u4f0a\u7281\u54c8\u8428\u514b\u81ea\u6cbb\u5dde|Ili|ylhskzzz","\u963f\u52d2\u6cf0\u5730\u533a|Altay|altdq","\u9999\u6e2f\u7279\u533a|HongKongIsland|xgtq"]
    //var allCities = ["\u5317\u4eac|beijing|bj","\u5929\u6d25|tianjin|tj","\u627f\u5fb7|chengde|cd","\u547c\u4f26\u8d1d\u5c14|hulunbeier|hlbe","\u6c88\u9633|shenyang|sy","\u5927\u8fde|dalian|dl","\u4e39\u4e1c|dandong|dd","\u5409\u6797|jilin|jl","\u5ef6\u8fb9\u671d\u9c9c\u65cf\u81ea\u6cbb\u5dde|yanbianchaoxianzuzizhizhou|ybcxzzzz","\u54c8\u5c14\u6ee8|haerbin|heb","\u5927\u5174\u5b89\u5cad\u5730\u533a|daxinganlingdiqu|dxaldq","\u4e0a\u6d77|shanghai|sh","\u5357\u4eac|nanjing|nj","\u65e0\u9521|wuxi|wx","\u82cf\u5dde|suzhou|sz","\u9547\u6c5f|zhenjiang|zj","\u676d\u5dde|hangzhou|hz","\u5b81\u6ce2|ningbo|nb","\u5609\u5174|jiaxing|jx","\u6e56\u5dde|huzhou|hz","\u7ecd\u5174|shaoxing|sx","\u821f\u5c71|zhoushan|zs","\u5408\u80a5|hefei|hf","\u9ec4\u5c71|huangshan|hs","\u5ba3\u57ce|xuancheng|xc","\u53a6\u95e8|xiamen|xm","\u6cc9\u5dde|quanzhou|qz","\u6f33\u5dde|zhangzhou|zz","\u5357\u660c|nanchang|nc","\u666f\u5fb7\u9547|jingdezhen|jdz","\u4e0a\u9976|shangrao|sr","\u6d4e\u5357|jinan|jn","\u9752\u5c9b|qingdao|qd","\u70df\u53f0|yantai|yt","\u6d4e\u5b81|jining|jn","\u6cf0\u5b89|taian|ta","\u5a01\u6d77|weihai|wh","\u90d1\u5dde|zhengzhou|zz","\u5b89\u9633|anyang|ay","\u6b66\u6c49|wuhan|wh","\u6069\u65bd\u571f\u5bb6\u65cf\u82d7\u65cf\u81ea\u6cbb\u5dde|enshitujiazumiaozuzizhizhou|estjzmzzzz","\u957f\u6c99|changsha|cs","\u8861\u9633|hengyang|hy","\u90b5\u9633|shaoyang|sy","\u5f20\u5bb6\u754c|zhangjiajie|zjj","\u5e7f\u5dde|guangzhou|gz","\u97f6\u5173|shaoguan|sg","\u6df1\u5733|shen|s","\u73e0\u6d77|zhuhai|zh","\u4e1c\u839e|dong|d","\u6842\u6797|guilin|gl","\u5317\u6d77|beihai|bh","\u6d77\u53e3|haikou|hk","\u6210\u90fd|chengdu|cd","\u7ef5\u9633|mianyang|my","\u4e50\u5c71|leshan|ls","\u963f\u575d\u85cf\u65cf\u7f8c\u65cf\u81ea\u6cbb\u5dde|abacangzuqiangzuzizhizhou|abczqzzzz","\u7518\u5b5c\u85cf\u65cf\u81ea\u6cbb\u5dde|ganzicangzuzizhizhou|gzczzzz","\u51c9\u5c71\u5f5d\u65cf\u81ea\u6cbb\u5dde|liangshanyizuzizhizhou|lsyzzzz","\u9ed4\u4e1c\u5357\u82d7\u65cf\u4f97\u65cf\u81ea\u6cbb\u5dde|qiandongnanmiaozudongzuzizhizhou|qdnmzdzzzz","\u6606\u660e|kunming|km","\u4e3d\u6c5f|lijiang|lj","\u5927\u7406\u767d\u65cf\u81ea\u6cbb\u5dde|dalibaizuzizhizhou|dlbzzzz","\u6012\u6c5f\u5088\u50f3\u65cf\u81ea\u6cbb\u5dde|nujianglisuzuzizhizhou|njlszzzz","\u8fea\u5e86\u85cf\u65cf\u81ea\u6cbb\u5dde|diqingcangzuzizhizhou|dqczzzz","\u62c9\u8428|lasa|ls","\u6797\u829d\u5730\u533a|linzhidiqu|lzdq","\u897f\u5b89|xian|xa","\u5609\u5cea\u5173|jiayuguan|jyg","\u5f20\u6396|zhangye|zy","\u9152\u6cc9|jiuquan|jq","\u7518\u5357\u85cf\u65cf\u81ea\u6cbb\u5dde|gannancangzuzizhizhou|gnczzzz","\u897f\u5b81|xining|xn","\u6d77\u5357\u85cf\u65cf\u81ea\u6cbb\u5dde|hainancangzuzizhizhou|hnczzzz","\u94f6\u5ddd|yinchuan|yc","\u56fa\u539f|guyuan|gy","\u5580\u4ec0\u5730\u533a|kashidiqu|ksdq","\u4f0a\u7281\u54c8\u8428\u514b\u81ea\u6cbb\u5dde|yilihasakezizhizhou|ylhskzzz","\u963f\u52d2\u6cf0\u5730\u533a|aletaidiqu|altdq"];
    //var allCities = ["\u963f\u575d\u85cf\u65cf\u7f8c\u65cf\u81ea\u6cbb\u5dde|abacangzuqiangzuzizhizhou|abczqzzzz","\u963f\u52d2\u6cf0\u5730\u533a|aletaidiqu|altdq","\u5317\u6d77|beihai|bh","\u5317\u4eac|beijing|bj","\u957f\u6c99|changsha|cs","\u6210\u90fd|chengdu|cd","\u627f\u5fb7|chengde|cd","\u5927\u7406\u767d\u65cf\u81ea\u6cbb\u5dde|dalibaizuzizhizhou|dlbzzzz","\u5927\u8fde|dalian|dl","\u5927\u5174\u5b89\u5cad\u5730\u533a|daxinganlingdiqu|dxaldq","\u8fea\u5e86\u85cf\u65cf\u81ea\u6cbb\u5dde|diqingcangzuzizhizhou|dqczzzz","\u4e1c\u839e|dong|d","\u6069\u65bd\u571f\u5bb6\u65cf\u82d7\u65cf\u81ea\u6cbb\u5dde|enshitujiazumiaozuzizhizhou|estjzmzzzz","\u7518\u5357\u85cf\u65cf\u81ea\u6cbb\u5dde|gannancangzuzizhizhou|gnczzzz","\u7518\u5b5c\u85cf\u65cf\u81ea\u6cbb\u5dde|ganzicangzuzizhizhou|gzczzzz","\u5e7f\u5dde|guangzhou|gz","\u6842\u6797|guilin|gl","\u54c8\u5c14\u6ee8|haerbin|heb","\u6d77\u5357\u85cf\u65cf\u81ea\u6cbb\u5dde|hainancangzuzizhizhou|hnczzzz","\u676d\u5dde|hangzhou|hz","\u5408\u80a5|hefei|hf","\u8861\u9633|hengyang|hy","\u547c\u4f26\u8d1d\u5c14|hulunbeier|hlbe","\u5409\u6797|jilin|jl","\u6d4e\u5357|jinan|jn","\u5609\u5174|jiaxing|jx","\u666f\u5fb7\u9547|jingdezhen|jdz","\u9152\u6cc9|jiuquan|jq","\u5580\u4ec0\u5730\u533a|kashidiqu|ksdq","\u6606\u660e|kunming|km","\u62c9\u8428|lasa|ls","\u4e50\u5c71|leshan|ls","\u4e3d\u6c5f|lijiang|lj","\u6797\u829d\u5730\u533a|linzhidiqu|lzdq","\u5357\u660c|nanchang|nc","\u5357\u4eac|nanjing|nj","\u5b81\u6ce2|ningbo|nb","\u6012\u6c5f\u5088\u50f3\u65cf\u81ea\u6cbb\u5dde|nujianglisuzuzizhizhou|njlszzzz","\u9ed4\u4e1c\u5357\u82d7\u65cf\u4f97\u65cf\u81ea\u6cbb\u5dde|qiandongnanmiaozudongzuzizhizhou|qdnmzdzzzz","\u9752\u5c9b|qingdao|qd","\u65e5\u5580\u5219\u5730\u533a|rikazediqu|rkzdq","\u4e0a\u6d77|shanghai|sh","\u4e0a\u9976|shangrao|sr","\u97f6\u5173|shaoguan|sg","\u7ecd\u5174|shaoxing|sx","\u6df1\u5733|shen|s","\u6c88\u9633|shenyang|sy","\u82cf\u5dde|suzhou|sz","\u6cf0\u5b89|taian|ta","\u5929\u6d25|tianjin|tj","\u5a01\u6d77|weihai|wh","\u65e0\u9521|wuxi|wx","\u6b66\u6c49|wuhan|wh","\u897f\u5b89|xian|xa","\u897f\u5b81|xining|xn","\u53a6\u95e8|xiamen|xm","\u9999\u6e2f\u7279\u522b\u884c\u653f\u533a|xianggangtebiexingzhengqu|xgtbxzq","\u70df\u53f0|yantai|yt","\u5ef6\u8fb9\u671d\u9c9c\u65cf\u81ea\u6cbb\u5dde|yanbianchaoxianzuzizhizhou|ybcxzzzz","\u4f0a\u7281\u54c8\u8428\u514b\u81ea\u6cbb\u5dde|yilihasakezizhizhou|ylhskzzz","\u94f6\u5ddd|yinchuan|yc","\u5f20\u5bb6\u754c|zhangjiajie|zjj","\u5f20\u6396|zhangye|zy","\u6f33\u5dde|zhangzhou|zz","\u9547\u6c5f|zhenjiang|zj","\u90d1\u5dde|zhengzhou|zz","\u821f\u5c71|zhoushan|zs"];

    var hotCities = ["\u5317\u4eac","\u4e0a\u6d77","\u5e7f\u5dde","\u6df1\u5733","\u676d\u5dde","\u897f\u5b89","\u5929\u6d25","\u5357\u4eac","\u6210\u90fd","\u62c9\u8428","\u6606\u660e","\u4e09\u4e9a","\u6b66\u6c49","\u54c8\u5c14\u6ee8","\u82cf\u5dde","\u53a6\u95e8","\u5927\u7406","\u4e3d\u6c5f","\u5927\u8fde","\u6842\u6797","\u9ec4\u5c71","\u963f\u52d2\u6cf0\u5730\u533a","<a href='http://www.yhachina.com/web-topic-view-id-335'><font style='color: #000000;'>香港</font></a>","<a href='http://www.yhachina.com/web-topic-view-id-341'><font style='color: #000000;'>澳门</font></a>"];

    var regEx = /^([\u4E00-\u9FA5\uf900-\ufa2d]+)\|(\w+)\|(\w)\w*$/i, // 匹配汉字，拼音
        regExChiese = /([\u4E00-\u9FA5\uf900-\ufa2d]+)/, // 只匹配拼音
        reg_ah = /^[a-g]$/i, // 匹配首字母为 a-h
        reg_ip = /^[h-p]/i, // 匹配首字母为 i-p
        reg_qz = /^[q-z]/i; // 匹配首字母为 q-z

    //构建城市分类字面量
    var city = {
        hot: {},
		All: {},
        ABCDEFG: {},
        HIJKLMNOP: {},
        QRSTUVWXYZ: {}
    };
    city.hot['hot'] = hotCities;

    //城市按首字母分类，填充到分类字面量
    (function() {
        for (var i = 0, len = allCities.length; i < len; i++) {
            var part = regEx.exec(allCities[i]),
                en = part[1], //中文名
                letter = part[2], //拼音
                spletter = part[3], //拼音简写
                first = letter[0].toUpperCase(), //拼音首字母
                ltPart; //当前字母下的城市

            if (reg_ah.test(first)) {
                ltPart = 'ABCDEFG';
            } else if (reg_ip.test(first)) {
                ltPart = 'HIJKLMNOP';
            } else if (reg_qz.test(first)) {
                ltPart = 'QRSTUVWXYZ';
            }

            city[ltPart][first] ? city[ltPart][first].push(en) : (city[ltPart][first] = [], city[ltPart][first].push(en));

            //设置前16个城市为热门城市
//            if (i < 16) {
//                city.hot['hot'] ? city.hot['hot'].push(part[1]) : (city.hot['hot'] = [], city.hot['hot'].push(part[1]));
//            }
        }
    })();

    var KuCity = function(target) {
        this.target = target; // 输入框
        this.container = null; //插件容器
        this.resultct = null; //搜索结果容器
        this.isKeyslect = false; //是否在用上下键选择
        this.isContainerExit = false; // 插件容器是否已存在
    };

    KuCity.prototype = {
        constructor: KuCity,
        //初始化
        init: function() {
            this.creatItem();
            this.tabChange();
            this.citySelect();
            this.inputSearch();
            this.keySelect();
            this.stopPropagation();
        },
        //创建市列表
        creatItem: function() {
            if(this.isContainerExit) return;
            var template = '<div class="kucity"><div class="citybox"><h3 class="kucity_header">热门城市(支持汉字/拼音搜索)</h3><ul class="kucity_nav"><li class="active">热门城市</li><li  class="active"><a href="http://www.yhachina.com/web-topic-view-id-333" target="_blank">旅舍总览</a></li><li>ABCDEFG</li><li>HIJKLMNOP</li><li>QRSTUVWXYZ</li></ul><div class="kucity_body"></div></div><ul class="result"></ul></div>';
            $('body').append(template);

            this.container = $('.kucity');
            this.resultct = $('.result');

            for (var group in city) {
                var itemKey = [];

                for (var item in city[group]) {
                    itemKey.push(item);
                }
                itemKey.sort();
                var itembox = $('<div class="kucity_item">');
                itembox.addClass(group);

                for (var i = 0, iLen = itemKey.length; i < iLen; i++) {

                    var dl = $('<dl>'),
                        dt = '<dt>' + (itemKey[i] == 'hot' ? '' : itemKey[i]) + '</dt>',
                        dd = $('<dd>'),
                        str = '';

                    for (var j = 0, jLen = city[group][itemKey[i]].length; j < jLen; j++) {
                        str += '<span>' + city[group][itemKey[i]][j] + '</span>'
                    }

                    dd.append(str);
                    dl.append(dt).append(dd);
                    itembox.append(dl);
                }
                $('.kucity_body').append(itembox);
                this.container.find('.hot').addClass('active');
            }
            this.isContainerExit = true;
        },
        //创建搜索结果列表
        creatResult: function(re, value) {
            var result = re.result,
                len = result.length,
                str = '';

        //显示信息

             if (!!len) {
                 for (var i = 0; i < len; i++) {
                     str += '<li><span class="name">' + result[i].cityName + '</span><span class="letter">' + result[i].lsCity + '</span></li>'
                 }
                 this.container.find('.result').html('').html(str).find('li').eq(0).addClass('active');
             } else {
                 this.container.find('.result').html('<li>没有找到<span class="noresult">' + value + '</span>相关信息</li>');
             }
        },
        //列表切换
        tabChange: function() {
            $('.kucity_nav').on('click', 'li', function(e) {
                var current = $(e.target),
                    index = current.index();

                current.addClass('active').siblings().removeClass('active');
                $('.kucity_item').eq(index).addClass('active').siblings().removeClass('active');
                $(' .kucity_body').scrollTop(0);

            })
        },
        //城市选择
        citySelect: function() {
            var self = this;
            $('.kucity_item dd').on('click', 'span', function(e) {
                self.target.val(($(e.target).text()));
                self.container.hide();
                $('#Date_a').focus();
            })
        },
        //上下键选择搜索结果
        keySelect: function() {
            var self = this;
            this.target.on('keydown', function(e){
                var current = self.resultct.find('.active').index();
                if(current !== -1){
                    switch(e.keyCode){
                        //上
                        case 38: 
                            keyActive(false);
                            break;
                        //下
                        case 40:
                            keyActive(true);
                            break;
                        //确定
                        case 13: 
                            self.isKeyslect = false;
                            self.target.val(self.resultct.find('.active .name').text());
                            self.triggleShow('all');
                            self.target.blur();
                            break;
                        default: 
                            self.isKeyslect = false;
                            break;
                    }


                }
                function keyActive(isInorder) {
                    var max = self.resultct.find('li').length - 1;
                    if(isInorder){
                        current = current == max ? 0 : current + 1;
                    }else{
                        current = current == 0 ? max : current - 1;
                    }
                    self.resultct.find('li').eq(current).addClass('active').siblings().removeClass('active');
                    self.isKeyslect = true;
                }
            })
        },
        //搜索
        inputSearch: function() {
            var self = this;
            this.target.on('keyup', function(e) {
                if(!self.isKeyslect){
                    self.throttle(search, this);
                }
            })
            // 输入框搜索
            function search(e) {
                var container = self.container;
                self.triggleShow(false);
                
                var value = $(this).val();  
            
                if (value) {
                    var url = '/web-hotel-getCityListAjax-key-'+value;
//                    var url = 'js/index.php?p='+value;
                    /*匹配返回的json格式为
                        '{"result": [
                                {"py":"guangzhou" , "spy":"gz" , "cityCode":"gz" , "cityName":"广州"  },
                                {"py":"guangzhou" , "spy":"gz" , "cityCode":"gz" , "cityName":"广州2"  }
                            ]}'
                    */
                    $.ajax({
                        url: url,
                        type: 'get',
                        dataType: 'json',
                    }).done(function(re) {
                        self.creatResult(re, value);
                    })
                } else {
                    self.triggleShow(true);
                }
            }
        },
        //列表，结果，整体 显示切换
        triggleShow: function(open) {
            var container = this.container;
            if (open === 'all') {
                container.hide()
            } else if (open) {
                container.find('.citybox').show().end().find('.result').hide();
            } else {
                container.find('.citybox').hide().end().find('.result').show();
            }
        },
        //函数节流
        throttle: function(fn, context) {
            clearTimeout(fn.tId);
            fn.tId = setTimeout(function(){
                fn.call(context);
            }, 100)
        },
        //阻止事件冒泡
        stopPropagation: function() {
            var self = this;
            //阻止事件冒泡
            this.container.on('click', stopPropagation);
            this.target.on('click', stopPropagation);
            //页面点击 隐藏
            $(document).on('click', function() {
                self.container.hide();
            })
            function stopPropagation(e) {
                e.stopPropagation();
            }
        }
    };

    var kucity = null;
    $.fn.kuCity = function(options) {
        var target = $(this);
        target.on('focus', function(e) {
            var top = $(this).offset().top + $(this).outerHeight(),
                left = $(this).offset().left;
            kucity = kucity ? kucity : new KuCity(target);
            kucity.target = $(e.target);
            kucity.init();
            kucity.container.show().offset({
                'top': top + 7,
                'left': left
            });
            kucity.triggleShow(true);
            kucity.resultct.on('click', 'li', function() {
                kucity.target.val($(this).find('.name').text());
                kucity.triggleShow('all');
            })
        })
        return this;
    };
})(jQuery)
