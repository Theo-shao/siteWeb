var start = {
elem: '#Date_a',
format: 'YYYY-MM-DD',
min: laydate.now(), //设定最小日期为当前日期
max: laydate.now(+180), //最大日期
istime: true,
istoday: false,
event: 'focus',
choose: function(datas) {
    end.min = datas; //开始日选好后，重置结束日的最小日期
    end.start = datas //将结束日的初始值设定为开始日
    $('#Date_b').focus();
}
};
var end = {
elem: '#Date_b',
format: 'YYYY-MM-DD',
min: laydate.now(),
max: laydate.now(+181),
istime: true,
istoday: false,
event: 'focus',

};
laydate(start);
laydate(end);


//排序
function downup(obj,orderBy) {
 $(obj).addClass('on');
    var orderByType;
 if (!$(obj).hasClass('up')) {
    $(obj).removeClass('down').addClass('up');
     orderByType = 'up';
 } else {
    $(obj).removeClass('up').addClass('down');
     orderByType = 'down';
 }
    showHotel(1, orderBy+'_'+orderByType)
}

$('.c-b-l-list li').hover(function() {
// alert('into clist li');
    strs = $(this).attr('data-map').split(",");
    // 改变缩放中心点
    map.setZoomAndCenter(15, [strs[0], strs[1]]);
    $('.amap-marker').css({
        'transform': 'scale(1)'
    });
    $('.amap-marker').eq($(this).index()).css({
        'transform': 'scale(1.5)'
    });
}, function() {
    $('.amap-marker').css({
        'transform': 'scale(1)'
    });
});





    //需要添加标记的地理位置和信息
    var markers_demo = [{
        id: 'markers_1',
        icon: 'images/position-icon.png',
        title: '大隐国际青年旅舍1',
        address: '大隐国际青年旅舍地址1',
        tel: '010-64733333',
        url: '/web-hotel-detail-id-104623',
        position: [116.205467, 39.907761]
    }, {
        id: 'markers_2',
        icon: 'images/position-icon.png',
        title: '大隐国际青年旅舍2',
        address: '大隐国际青年旅舍地址2',
        tel: '010-64733333',
        url: '#',
        position: [116.368904, 39.913423]
    }, {
        id: 'markers_3',
        icon: 'images/position-icon.png',
        title: '大隐国际青年旅舍3',
        address: '大隐国际青年旅舍地址3',
        tel: '010-64733333',
        url: '#',
        position: [116.305467, 39.807761]
    }];

//地图初始化时，在地图上添加一个marker标记,鼠标点击marker可弹出自定义的信息窗体
var map = new AMap.Map("ditu", {
    resizeEnable: true,
    center: [116.397428, 39.90923],
    zoom: 12
});
function addMarker(markers,cityc) {
    map.clearMap(); // 清除地图覆盖物

//    var citycenter = [91.140853,29.645566];
    var citycenter = [ cityc[0],cityc[1]  ];
    map.setCenter(citycenter);
    map.setZoom(15);
    // 添加一些分布不均的点到地图上,地图上添加三个点标记，作为参照
    markers.forEach(function(marker, index) {
        marker.id = new AMap.Marker({
            map: map,
            icon: marker.icon,
            position: [marker.position[0], marker.position[1]],
            offset: new AMap.Pixel(-12, -36)
        });

        //鼠标点击marker弹出自定义的信息窗体
        AMap.event.addListener(marker.id, 'click', function() {
            // alert(index)
            //实例化信息窗体
            var title = '地址：'+marker.title,
                content = [];
            content.push("<img src='http://tpc.googlesyndication.com/simgad/5843493769827749134'>地址："+marker.address);
            content.push("电话："+marker.tel);
            content.push("<a href='"+marker.url+"' target='_blank' >详细信息</a>");
            var infoWindow = new AMap.InfoWindow({
                isCustom: true, //使用自定义窗体
                content: createInfoWindow(title, content.join("<br/>")),
                offset: new AMap.Pixel(16, -45)
            });
            infoWindow.open(map, marker.id.getPosition());
        });
    });
}

function createInfoWindow(title, content) {
    var info = document.createElement("div");
    info.className = "info";

    //可以通过下面的方式修改自定义窗体的宽高
    //info.style.width = "400px";
    // 定义顶部标题
    var top = document.createElement("div");
    var titleD = document.createElement("div");
    var closeX = document.createElement("img");
    top.className = "info-top";
    titleD.innerHTML = title;
    closeX.src = "http://webapi.amap.com/images/close2.gif";
    closeX.onclick = closeInfoWindow;

    top.appendChild(titleD);
    top.appendChild(closeX);
    info.appendChild(top);

    // 定义中部内容
    var middle = document.createElement("div");
    middle.className = "info-middle";
    middle.style.backgroundColor = 'white';
    middle.innerHTML = content;
    info.appendChild(middle);

    // 定义底部内容
    var bottom = document.createElement("div");
    bottom.className = "info-bottom";
    bottom.style.position = 'relative';
    bottom.style.top = '0px';
    bottom.style.margin = '0 auto';
    var sharp = document.createElement("img");
    sharp.src = "http://webapi.amap.com/images/sharp.png";
    bottom.appendChild(sharp);
    info.appendChild(bottom);
    return info;
}

function closeInfoWindow() {
    map.clearInfoWindow();
}

$('.fullscreen').click(function() {
    if ($('#ditu').hasClass('on')) {
        $('#ditu').removeClass('on')
    } else {
        $('#ditu').addClass('on')
    }
});




$(".check_label").checkbox();

$('#list1-active a').eachshpw($('#list1-active a'), $('.list1-active-b'), true, 'sb')



function queryHotel()
{
    var stime = $('#stime').val();
    var etime = $('#etime').val();

    if(stime == '' || stime == 'YYYY-MM-DD')
    {
        alert('请选择入住日期');
        $('#stime').select();
        return false;
    }
    if(etime == '' || etime == 'YYYY-MM-DD' )
    {
        alert('请选择退房日期');
        $('#etime').select();
        return false;
    }
    showHotel(1);    


}

function showHotel(page,orderBy)
{
    page = page ? page : 1;
    orderBy = orderBy ? orderBy : '';

    //兼容多语言
    var u = window.location.href;
    var str = u.substring( u.lastIndexOf("/")+1 );

    if(0==str.indexOf("web")){
        var url = "/web-hostel-listsajax";
    }else{
        var ln = str.substring(0, str.indexOf("-"))
        var url = "/" +ln+ "-web-hostel-listsajax";
    }

    var stime = $('#Date_a').val();
    var etime = $('#Date_b').val();
    var qname = $('#Destination').val();
    var qtype = $('#querytype').val();
    var qhotel = $('#queryhotel').val();
    var qservice = $('#queryservice').val();
    var qdevice = $('#querydevice').val();
    var qprice = $('#queryprice').val();
    var inum = 0;

    $('#search_cityname').text(qname);
    $('.c-b-l-list').text('loading...');
    $('.page-box').hide();//分页暂时隐藏


    $.post(url,{page:page,qname:qname,stime:stime,etime:etime,qtype:qtype,qhotel:qhotel,qservice:qservice,qdevice:qdevice,qprice:qprice,orderBy:orderBy},function(json)
    {
        $('.c-b-l-list').text('');

        for(var item in json.data)
        {
            var itemContent = json.data[item];
            // 处理查询旅舍信息
            if(itemContent.lsName != '' && itemContent.lsName != 'undefined' )
            {
                var hotelHtml = template.render('hotelTemplate',itemContent);
                $('.c-b-l-list').append(hotelHtml);
            }

        }

        $('#search_hotelnum').text(json.totalCount);
        // 分页展示
        $('#pagelist').empty();
        if(json.totalPage > 1)
        {
            for(var i=1;i<= json.totalPage; i++)
            {
                var pageHtml = '<a href="javascript:void()" onclick="showHotel('+i+')" >'+i+'</a>';
                $('#pagelist').append(pageHtml);
            }
        }
        $('.page-box').show();//分页显示

        // 展示高德地图的旅舍标志
        var markers = json.markers;
        var citycenter = json.citycenter;// 城市中心
        addMarker(markers,citycenter);
    });



//    $('.l_hotellist').text('test');
}

function markviewlog(id)
{
    var url = "/web-hotel-markviewlog";

    $.post(url,{"id":id},function(json)
    {
//        alert(json.totalCount);
    });
}        

// 收藏
//t 相当于this
function addfavorite(t, id)
{
    $.post("/web-hotel-addfavorite",{id:id},function(msg){
        if( 'ok' == msg){
            alert("收藏成功");
        }else{
            alert(msg)
        }
    })
}
// 点评
function comment(id)
{

}

function show_marker(id)
{
    var obj = $('#list-hotel-'+id);
    strs = obj.attr('data-map').split(",");
// alert('str='+strs[0]);

    // 改变缩放中心点
    map.setZoomAndCenter(15, [strs[0], strs[1]]);
//    $('.amap-marker').css({
//        'transform': 'scale(1)'
//    });

    $('#list-hotel'+id+' > .amap-marker').css({
        'transform': 'scale(1.5)'
    });


}