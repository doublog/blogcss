<?php

function access_submit($comment) {
   if (!is_user_logged_in()) {
          if(isset($_POST['access_submit'])) {
              return($comment);
          } else {
              if (isset($_POST['isajaxtype']) && $_POST['isajaxtype'] > -1) {
                  die("请先同意声明");
              } else {
                  if(function_exists('err')){
                      err("请先同意声明");
                 } else {
                      wp_die("请先同意声明");
                  } 
              }
          }
   } else {
       return($comment);
   } 
}
add_action('preprocess_comment', 'access_submit');
function add_checkbox() {   
   if (!is_user_logged_in()) {
      $content.= '<input type="checkbox" name="access_submit" id="access_submit" value="access_submit" style="width: 15px;" /><label for="access_submit" style="margin-left:5px;">同意声明并回复楼主  </label>';   
      $content.= '<span style="font-weight:bold;text-shadow:0 1px 0 #ddd;">  声明:</span> 本博只是私人记录吐槽的地方，切勿模仿与转载！';
      echo $content;
   } 
}   
add_action('comment_form', 'add_checkbox');

// debug - if true the errors will display below footer when admin login
//define('winysky_DEBUG', true);

// functions for other functions
include_once TEMPLATEPATH.'/includes/options/theme_options.php';

// app dir
define('Abook_Include', TEMPLATEPATH.'/includes');

/**
 * include all PHP script
 * @param string $dir
 * @return unknown_type
 */
function IncludeAll($dir){
	$dir = realpath($dir);
	if($dir){
		$files = scandir($dir);
		sort($files);
		foreach($files as $file){
			if($file == '.' || $file == '..'){
				continue;
			}elseif(preg_match('/\.php$/i', $file)){
				include_once $dir.'/'.$file;
			}
		}
	}
}
// include functions from yinheli
IncludeAll( Abook_Include );
