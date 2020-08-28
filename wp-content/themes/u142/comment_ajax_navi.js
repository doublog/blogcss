var navi='#allcomments_pagesize';
var navi_a='#allcomments_pagesize a';
var content='#ajaxcomment';
 
$(document).ready(function comment_ajax_navi (){
	$(navi_a).click(function() {
		var z = $(this).attr("href");
		$.ajax({
			url: z,
			type:"POST",
			data:"action=comment_ajax_navi",
			beforeSend:function()
			{
				document.body.style.cursor = 'wait';
				var C=0.7;
				$(content).css({opacity:C,MozOpacity:C,KhtmlOpacity:C,filter:'alpha(opacity=' + C * 100 + ')'});				
			},
			//error: function(request) 
			//{
			//	alert(request.responseText);
			//},
			error:function (xhr, textStatus, thrownError){ 
				alert("readyState: " + xhr.readyState + " status:" + xhr.status + " statusText:" + xhr.statusText +" responseText:" +xhr.responseText + " responseXML:" + xhr.responseXML + " onreadystatechange" +xhr.onreadystatechange); 		
				alert(thrownError); 
			},	
			success: function (data)
			{
				//alert(data);
				$(content).html(data);				
				document.body.style.cursor = 'auto';
				var C=1; 
				$(content).css({opacity:C,MozOpacity:C,KhtmlOpacity:C,filter:'alpha(opacity=' + C * 100 + ')'});
				comment_ajax_navi();//翻页后DOM变化了,需要重新绑定函数
				jQuery('html, body').animate({scrollTop:$(content).offset().top - 100}, 'slow');
			}
		});
		return false;
		});
})