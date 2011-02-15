<?php
header('Content-Type: text/javascript');
if ( strrpos( $_SERVER['REQUEST_URI'], 'no-cache' ) === FALSE ) {
	header('Cache-Control: max-age=60, must-revalidate');
	header("Expires: Thu, 31 Dec 2020 20:00:00 GMT");
} else {
	$pretty_modtime = gmdate('D, d M Y H:i:s') . 'GMT'; 
	header('Cache-Control: max-age=0, must-revalidate');
	header("Last-Modified: $pretty_modtime"); 
	header("Expires: $pretty_modtime"); 
	header("Pragma: no-cache"); 
}
$subject = $_SERVER['REQUEST_URI'];
$pattern = '/\/sleep-(\d+)\//';
preg_match($pattern, $subject, $matches);
if (sizeof($matches) > 1) {
  sleep($matches[1]);
}
echo 'window.' . basename($_SERVER['REQUEST_URI'], '.js') . ' = true;';
