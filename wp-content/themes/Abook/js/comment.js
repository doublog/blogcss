var myField=document.getElementById("comment")||0;function ids(a){return document.getElementById(a)}function setStyleDisplay(a,b){ids(a).style.display=b}function addSmelie(a){var b=document.getElementById("comment");return addEditor(b," "+a+" ","",!0)}
function addEditor(a,b,c,d){if(document.selection)a.focus(),sel=document.selection.createRange(),index=c?a.value.indexOf(b+sel.text+c):a.value.indexOf(b.replace(/ :[a-z\?]+?: /gi,"smelis")),index==-1?c?sel.text=b+sel.text+c:sel.text=b:alert("\u5df2\u7ecf\u63d2\u5165\u8fc7\u4e86!"),a.focus();else if(a.selectionStart||a.selectionStart=="0"){var f=a.selectionStart,e=a.selectionEnd,g=e;index=c?a.value.indexOf(b+a.value.substring(f,e)+c):a.value.indexOf(b.replace(/ :[a-z\?]+?: /gi,"smelis"));index==-1?
(c?a.value=a.value.substring(0,f)+b+a.value.substring(f,e)+c+a.value.substring(e,a.value.length):a.value=a.value.substring(0,f)+b+a.value.substring(e,a.value.length),c?g+=b.length+c.length:g+=b.length-e+f,f==e&&c&&(g-=c.length)):(alert("\u5df2\u7ecf\u63d2\u5165\u8fc7\u4e86!"),g=index+b.length);a.focus();a.selectionStart=g;a.selectionEnd=g}else a.value+=b+c,a.focus();d&&setStyleDisplay("smelislist","none")}
var Editor={strong:function(){addEditor(myField,"<strong>","</strong>")},ahref:function(){var a=prompt("\u8f93\u5165\u5730\u5740","http://");a&&addEditor(myField,'<a target="_blank" href="'+a+'" rel="external">',"</a>")},img:function(){var a=prompt("\u8f93\u5165\u56fe\u7247\u5730\u5740","http://");a&&(a="[img src="+a+" alt="+prompt("\u8f93\u5165\u63cf\u8ff0\uff08\u53ef\u8df3\u8fc7\uff09","")+" /]",addEditor(myField,a))},code:function(){addEditor(myField,"<code>","</code>")},blockquote:function(){addEditor(myField,
"<blockquote>","</blockquote>")},fontColor:function(){var a=prompt("\u8f93\u5165\u989c\u8272css\u503c","#000000");a&&addEditor(myField,"[color=#"+a.match(/[^#]{3,6}/gi)[0]+"]","[/color]")},fontSize:function(){var a=prompt("\u8f93\u5165\u5b57\u4f53\u5927\u5c0f\uff0c\u4f8b\u598212px","12px");a&&addEditor(myField,"[size="+a.match(/\d+/gi)[0]+"px]","[/size]")},clear:function(){if(document.selection)myField.focus(),sel=document.selection.createRange(),sel.text=sel.text.replace(/(?:<|\[)[^>]*?(?:>|\])/gi,
""),myField.focus();else if(myField.selectionStart||myField.selectionStart=="0"){var a=myField.selectionStart,b=myField.selectionEnd;myField.value=myField.value.substring(0,a)+myField.value.substring(a,b).replace(/(?:<|\[)[^>]*?(?:>|\])/gi,"")+myField.value.substring(b,myField.value.length);myField.focus();myField.selectionStart=a;myField.selectionEnd=a}else myField.value=myField.value.replace(/(?:<|\[)[^>]*?(?:>|\])/gi,""),myField.focus()},empty:function(){myField.value="";myField.focus()}},mycode=
document.getElementById("commentform")||0;mycode.onsubmit=function(){var a=document.getElementById("comment"),b=a.value;a.value="";b=$("#commento").html()+b;a.value+=b;var c=b.indexOf("<code>"),d=b.indexOf("</code>");if(c>-1&&d>-1&&c<d)for(a.value="";d!=-1;)a.value+=b.substring(0,c+6)+b.substring(c+6,d).replace(/<(?=[^>]*?>)/gi,"<").replace(/>/gi,">"),b=b.substring(d+7,b.length),c=b.indexOf("<code>")==-1?-6:b.indexOf("<code>"),d=b.indexOf("</code>"),a.value+=d==-1?"</code>"+b:"</code>"};
myField.onclick=function(){setStyleDisplay("smelislist","none")};
jQuery(document).ready(function(a){a("#comment").bind("focus keyup input paste",function(){this.value.length>800?(this.value=a(this).attr("value").substring(0,800),a("#num").text("\u4e0a\u9650800")):a("#num").text(a(this).attr("value").length)});a("#commentform").submit(function(){$cancel=a("#cancel-comment-reply-link");cancel_text=$cancel.text();a("#ajaxcommentmsg").html('<span class="ajaxwait">\u8bc4\u8bba\u63d0\u4ea4\u4e2d...</span>').fadeIn();$submit.attr("disabled",!0).fadeTo("slow",0.5);a.ajax({url:themeurl+
"comments-ajax.php",data:a(this).serialize(),type:a(this).attr("method"),error:function(b){a("#ajaxcommentmsg").html('<span class="ajaxerror">'+b.responseText+"</span>");setTimeout(function(){$submit.attr("disabled",!1).fadeTo("slow",1);a("#ajaxcommentmsg").hide()},3E3)},success:function(b){a("#ajaxcommentmsg").html('<span class="ajaxsuccess">\u63d0\u4ea4\u6210\u529f~</span>').fadeOut(4E3);a("#cancel-comment-reply-link").hide();a("#comment").attr("value","");a("#commento").html("");a("#comment_parent").attr("value",
"0");$comments=a("#number");$comments.length&&(n=parseInt($comments.text().match(/\d+/)),$comments.text($comments.text().replace(n,n+1)));new_htm='<ol id="new_comm">'+b+"</ol>";a("#ajaxpre").html("").append(new_htm).fadeIn(2E3);setTimeout(function(){a(".comment-num").after('<span class="comment-add">+1</span>');a(".comment-add").animate({fontColor:"#F76C00",opacity:"hide"},4E3)},1200);setTimeout(function(){a(".comment-add").remove();a(".comment-num").text(parseInt(a(".comment-num").text())+1)},3E3);
countdown()}});return!1});a("#toolBarloading").html("\u521d\u59cb\u5316\u5b8c\u6210").hide(2E3);a("#tools").fadeIn().show()});var wait=15,$submit=$("#submit_comment");$submit.attr("disabled",!1);submit_val=$submit.val();function countdown(){wait>0?($submit.val(wait),wait--,setTimeout(countdown,1E3)):($submit.val(submit_val).attr("disabled",!1).fadeTo("slow",1),wait=15)};