<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
<p>找东西？</p>
 
   <input type="text" value="搜索" name="s" id="s" onfocus="if (this.value == '搜索') {this.value = '';}" onblur="if (this.value == '') {this.value = '搜索';}"/>
   <br />
   <input type="submit" id="searchsubmit" value="GO" />
</form>
