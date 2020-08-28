$(document).ready(function(){

//首页幻灯和切换栏目
setFocusSlid('#focus_links', '#focus_img', 680, 'h');
new Rollable('#id_yinyue_part', 680);
new Rollable('#id_meinv_part', 680);
new Rollable('#id_wenzi_part', 680);
new Rollable('#id_qingyinyue_part', 680);
new Rollable('#id_shipin_part', 680);
new Rollable('#id_touxiang_part', 680);
new Rollable('#id_duanpian_part', 680);
new Rollable('#id_youqu_part', 680);

//导航
$(".nav ul li").each(function() {			
	var $sublist = $(this).find('ul:first');	
	$(this).hover(function() {	
		$(this).addClass('nav_hover');
		$sublist.stop().css( { display:"block", height:"auto", overflow:"hidden" } );
	},
	function() {	
		$(this).removeClass('nav_hover');
		$sublist.stop().css( {display:"none", overflow:"hidden"} );
	});	
});

//搜素框
var searchbox = document.getElementById("searchbox");
var searchtxt = document.getElementById("searchtxt");
var searchbtn = document.getElementById("searchbtn");
var tiptext = "亲,想搜点什么呢...";
if(searchtxt.value == "" || searchtxt.value == tiptext) {
	searchtxt.className += " searchtip";
	searchtxt.value = tiptext;
}
searchtxt.onfocus = function(e) {
	if(searchtxt.value == tiptext) {
		searchtxt.value = "";
		searchtxt.className = searchtxt.className.replace("searchtip", "");
	}
}
searchtxt.onblur = function(e) {
	if(searchtxt.value == "") {
		searchtxt.className += " searchtip";
		searchtxt.value = tiptext;
	}
}
searchbtn.onclick = function(e) {
	if(searchtxt.value == "" || searchtxt.value == tiptext) {
		return false;
	}
}

//评论框作者信息隐藏
$('#comment_author_info').hide();

//浮动收藏
$(window).bind("scroll", msg); 
$(window).bind("resize", msg);

//标签云sup
$("#tag-cloud a").append("<sup></sup>");
$("#tag-cloud a").find("sup").html( function(){
	var s=$(this).parent().attr("title").replace(/[^0-9]/ig, "");
	return parseInt(s);
});

//归档页面 jQ伸缩
$('#al_expand_collapse,#archives span.al_mon').css({cursor:"s-resize"});
$('#archives span.al_mon').each(function(){
	var num=$(this).next().children('li').size();
	var text=$(this).text();
	$(this).html(text+'<sup> [ 共 <em>'+num+'</em> 篇文章 ]</sup>');
});
var $al_post_list=$('#archives ul.al_post_list'),
	$al_post_list_f=$('#archives ul.al_post_list:first');
	$al_post_list.hide(1,function(){
		$al_post_list_f.show();
	});
	$('#archives span.al_mon').click(function(){
		$(this).next().slideToggle(400);
		return false;
	});
	$('#al_expand_collapse').toggle(function(){
		$al_post_list.show();
	},function(){
		$al_post_list.hide();
	});

//图片颜色渐变
$('img').not("#pic_list img,img.avatar").animate({"opacity":1});
$('img').not("#pic_list img,img.avatar").hover(function(){
	$(this).stop().animate({"opacity":.6})
},function(){
	$(this).stop().animate({"opacity":1})
});
	
});

var msg = function() {
	hh=$(document).height()+"px";
	var st = $(document).scrollTop();
	var winh = $(window).height();
	$("#favMsg").css("right",0);
	(st > 150) ? $("#favMsg").fadeIn() : $("#favMsg").fadeOut();
	if (!window.XMLHttpRequest) {
		 $("#favMsg").css("top", st + winh - 180);
	}
};

//添加收藏
function addFav() {
	addbookmarksite(window.document.title, 'href');
}

function addbookmarksite(title, url) {
    if (url == 'href') {
    	url = window.location.href;
	}
    if (document.all) {
    	window.external.AddFavorite(url, title);
	} else if (window.sidebar) {
    		window.sidebar.addPanel(title, url, "")
		} else {
			alert("对不起，您的浏览器不支持此操作!\n请您使用菜单栏或Ctrl+D收藏本站。")	
		}

}


//回到顶部
function Top() {
	$("html, body").animate({
		scrollTop : 0
	}, 120);
}

//幻灯
function setFocusSlid(linksId, imgId, height, dir){
	var li = $(linksId).find('li');
	var count = li.length;
	var focusIndex = 0;
	var focusInterval;
	var step = 1;
	var slidover = function(){
		var li = $(linksId).find('li');
		li.removeClass('act');
		$(li[focusIndex]).addClass('act');
		$(imgId).stop();
		if(dir=='h'){
			$(imgId).animate({scrollLeft: height * focusIndex}, 300);
		}else{
			$(imgId).animate({scrollTop: height * focusIndex}, 300);
		}
	}
	var slidout = function(){
		focusInterval = setInterval(slidInterval, 5000);
	}
	var slidInterval = function(){
		slidover();
		if(focusIndex == 0){
			step = 1;
		}
		if(focusIndex == count - 1){
			step = -1;
		}
		focusIndex+=step;
	}
	li.each(function(i){
		$(this).hover(function(){
			clearInterval(focusInterval);
			focusIndex = i;
			slidover();
		}, function(){
			slidout();
		});
	});
	focusIndex = 1;
	slidout();
}

function Rollable(id, width) {
	var btns=$(id).find('div.roll a');
	var lbtn=$(btns[0]), rbtn=$(btns[1]);
	var dots=$(id).find('div.roll span');
		var dotscount = dots.length;
	var ldot=$(dots[0]), rdot=$(dots[1]);
	var rollBox=$(id).find('div.roll_box');
	var leftRoll=function() {
		rollBox.animate({scrollLeft: 0 }, 300);
		lbtn.unbind();
		ldot.unbind();
		lbtn.removeClass('lact');
		rdot.removeClass('act');
		ldot.addClass('act');
		rbtn.addClass('ract');
		rbtn.click(rightRoll);
		rdot.click(rightRoll);
	}
	var rightRoll=function() {
		rollBox.animate({scrollLeft: width }, 300);
		rbtn.unbind();
		rdot.unbind();
		rbtn.removeClass('ract');
		ldot.removeClass('act');
		rdot.addClass('act');
		lbtn.addClass('lact');
		lbtn.click(leftRoll);
		ldot.click(leftRoll);
	}
		leftRoll();
}

//评论用户资料
function toggleCommentAuthorInfo() {
	$('#comment_author_info').slideToggle('slow', function(){
		if ( $('#comment_author_info').css('display') == 'none' ) {
			$('#toggle_comment_author_info').text('[ 显示资料 ]');
		} else {
			$('#toggle_comment_author_info').text('[ 隐藏资料 ]');
		}
	});
}