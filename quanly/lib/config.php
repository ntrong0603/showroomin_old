<?php if(!defined('_lib')) die("Error");
$config_url=$_SERVER["SERVER_NAME"].'';
if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protocol = 'https://';
}
else {
  $protocol = 'http://';
}
define("BASE_URL",$protocol.$config_url."/");
error_reporting(E_ERROR | E_PARSE);
$config['database']['servername'] = 'localhost';
$config['database']['username'] = 'root';
$config['database']['password'] = '';
$config['database']['database'] = 'showroomin_old';
$config['database']['refix'] = 'table_';
$config['social'] = array(
		"base_url" => "https://showroomin.com/", 
        "providers" => array ( 
            "Google" => array ( 
                "enabled" => true,
                "keys"    => array ( "id" => "YOUR_GOOGLE_API_KEY", "secret" => "YOUR_GOOGLE_API_SECRET" ), 
 
            ),
 
            "Facebook" => array ( 
                "enabled" => true,
                "keys"    => array ( "id" => "196822354435093", "secret" => "8149de4e4ef7157aa0217d009772d716" ),
                "scope" => "email, user_about_me, user_birthday, user_hometown"  //optional.              
            ),
 
            "Twitter" => array ( 
                "enabled" => true,
                "keys"    => array ( "key" => "TWITTER_DEVELOPER_KEY", "secret" => "TWITTER_SECRET" ) 
            ),
        ),
        // if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
        "debug_mode" => false,
        "debug_file" => "debug.log",
    );
	?>
