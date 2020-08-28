</section>
<footer class="footer">
    <div class="footer-inner">
        <div class="copyright pull-left">
      CopyRight   © 2011-2015 <a href="http://www.doublog.com/" title="豆子博客">豆子博客</a> <a href="http://www.miibeian.gov.cn" target="_bank">{渝ICP备15004698号-2}</a> 版权所有，保留一切权利 · <a href="http://www.doublog.com/sitemap.html" title="站点地图">站点地图</a>   ·   基于WordPress构建   ·   感谢欲思提供主题 托管于 <a rel="nofollow" target="_blank" href="http://www.doublog.com/go/dreamhost">DreamHost</a> And <a rel=nofollow target="_blank" href="http://www.doublog.com/go/qiniu">Qiniu</a>
        </div>
        <div class="trackcode pull-right">
            <?php if( dopt('d_track_b') ) echo dopt('d_track'); ?>
        </div>
    </div>
</footer>

<?php 
wp_footer(); 
global $dHasShare; 
if($dHasShare == true){ 
	echo'<script>with(document)0[(getElementsByTagName("head")[0]||body).appendChild(createElement("script")).src="http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion="+~(-new Date()/36e5)];</script>';
}  
if( dopt('d_footcode_b') ) echo dopt('d_footcode'); 
?>
</body>
</html>