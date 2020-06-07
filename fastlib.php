<?php
/**
 * Plugin Name: fastlib
 * Plugin URI: http://#/fastlib
 * Description: fast way to implement css,js famous libraries
 * Version: 1.0
 * Author: ALI KHATAB(KATAKI)
 * Author URI: http://github.com/kataki-kh
 */
//
///include the layout
require_once'fboptions.php';
/*
 if(get_option('FontAwesome')){
	echo"xoxo";
}
*/
//
$lib =  array('bootstrap' => 'fastlib/scripts/bootstrap','jquery' => 'fastlib/scripts/jquery' );
$check_values =array('bootstrap','jquery');
/////function to check the input and add the libraries
function check_insert_add_lib($string,$lib){
	//download the file using $api['link'] to plugin_dir_url( string $file )./css/

			// using wp_enqueue_style()to add the script and the ver

/*	$data="
wp_enqueue_style( $string, plugin_dir_url('fastlib').'fastlib/scripts/'.$string.'.css' ,array(),'1.0.0',true);
wp_enqueue_script( $string, plugin_dir_url('fastlib'). 'fastlib/scripts/'.$string.'.js', array('jquery'), '1.0.0', true );";
file_put_contents (get_template_directory_uri().'/functions.php',$data,FILE_APPEND | LOCK_EX);
*/
/*
if($string=='fontawesome'){
	//// copy the whole webfont directory to the theme directory using shell
shell_exec(' cp -R '.plugin_dir_url('fastlib'). 'fastlib/scripts/webfonts  '.get_template_directory_uri().'/  2>&1');

////
	}
	*/
//////
	
if(get_option($string)==1)	{



$location = $lib[$string];

wp_enqueue_style( $string, plugin_dir_url('fastlib').$location.'.css' ,array(),'9.0.0',true);
wp_enqueue_script( $string, plugin_dir_url('fastlib').$location.'.js', array('jquery'), '8.0.0', true );

}
}
///use it for all checked
function check($check_values,$lib){
	
$count =count($check_values);
for($i=0;$i<=$count;$i++){
	
	if(get_option($check_values[$i])==1){
		
check_insert_add_lib($check_values[$i],$lib);
	}
}
}
//check_insert_add_lib('bootstrap',$lib);
check($check_values,$lib);
add_action( 'wp_enqueue_scripts', 'check_insert_add_lib' );
?>