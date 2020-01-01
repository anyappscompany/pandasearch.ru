<?php

include_once("songsdb.php");
include_once("strings.php");
$result = mysql_query("SELECT translitkw, kw FROM (SELECT translitkw, id, kw FROM keywords ORDER BY id DESC LIMIT ".$urlliststotal.") as tmp ORDER BY id DESC");

while ( $postrow[] = mysql_fetch_array($result));
echo '<!DOCTYPE HTML><html><head><title>'.$_SERVER['SERVER_NAME'].'</title><meta charset="utf-8"></head><body>';
for($i = 0; $i < count($postrow); $i++)
{
  if(strlen($postrow[$i]['translitkw'])>0){
    if(isset($_GET['links'])&&$_GET['links']==true){
      echo "<a href='http://".$_SERVER['SERVER_NAME']."/".$postrow[$i]['translitkw'].".html'>".$postrow[$i]['kw']."</a><br />";
    }else{
echo "http://".$_SERVER['SERVER_NAME']."/".$postrow[$i]['translitkw'].".html<br />";
}
}
}
echo '</body></html>';

mysql_close($db);
?>