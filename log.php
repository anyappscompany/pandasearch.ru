<?php
$file = "logs/newlog".date("Y-m-d").".txt";
$ua = $_SERVER['HTTP_USER_AGENT'];
$curTime = date("Y-m-d H:i:s");
//echo $curTime." ".$ua." ".$file;
$ip = "unknown";
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

if($ip != '176.8.213.163'){
  file_put_contents($file, PHP_EOL ."<tr><td class='time'>".$curTime."</td><td class='ip'>".$ip."</td><td class='url'>".getUrl()."</td><td class='ua'>".$ua."</td></tr>", FILE_APPEND);
}















function getUrl() {
  $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
  $url .= ( $_SERVER["SERVER_PORT"] != 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
  $url .= $_SERVER["REQUEST_URI"];
  return $url;
}
?>