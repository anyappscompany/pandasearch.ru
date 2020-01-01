<?php

include_once("log.php");
$home = true;
$pageTemplate = file_get_contents("template/template.php");
include_once("functions.php");
include_once("songsdb.php");
include_once("genres.php");
include_once("strings.php");

$pageTemplate = str_replace("[UNIQUE]", md5(uniqid(rand(),1)), $pageTemplate);
$pageTemplate = str_replace("[TEXT1]", $text1, $pageTemplate);
$pageTemplate = str_replace("[HEADER]", "<img width='80px' src='http://".$_SERVER['SERVER_NAME']."/images/logo.png' />".$headertext, $pageTemplate);
$pageTemplate = str_replace("[GEOREGION]", $georegion, $pageTemplate);
$pageTemplate = str_replace("[GEOPLACENAME]", $geoplacename, $pageTemplate);
$pageTemplate = str_replace("[GEOPOSITION]", $geoposition, $pageTemplate);
$pageTemplate = str_replace("[GEOICBM]", $geoicbm, $pageTemplate);
$pageTemplate = str_replace("[ORGANIZATIONNAME]", $organizationname, $pageTemplate);
$pageTemplate = str_replace("[ORGANIZATIONLOCATION]", $organizationlocation, $pageTemplate);
$pageTemplate = str_replace("[STREETADDRESS]", $streetaddress, $pageTemplate);
$pageTemplate = str_replace("[ADDRESSLOCALITY]", $addresslocality, $pageTemplate);
$pageTemplate = str_replace("[ADDRESSREGION]", $addressregion, $pageTemplate);
$pageTemplate = str_replace("[PHONE]", $phone, $pageTemplate);
$pageTemplate = str_replace("[PHONENUMBER]", $phonenumber, $pageTemplate);
$pageTemplate = str_replace("[SITENAME]", $sitename, $pageTemplate);
$pageTemplate = str_replace("[SOCIALNETWORKS]", $socialnetworks, $pageTemplate);
$pageTemplate = str_replace("[LASTQUERIESTEXT]", $lastqueriestext, $pageTemplate);
$pageTemplate = str_replace("[HOME]", $home, $pageTemplate);
$pageTemplate = str_replace("[SONGSBYGENRE]", $songsbygenre, $pageTemplate);
$pageTemplate = str_replace("[HITS100]", $hits100, $pageTemplate);
$pageTemplate = str_replace("[RADIO]", $radio, $pageTemplate);

$pageTemplate = str_replace("[TITLESYMBOL]", $titlesymbol, $pageTemplate);


$LQnumlastsongs = 20;
$LQresult = mysql_query("SELECT * FROM (SELECT * FROM keywords ORDER BY id DESC LIMIT ".$LQnumlastsongs.") as tmp ORDER BY id DESC");
while ( $LQpostrow[] = mysql_fetch_array($LQresult));
for($LQi = 0; $LQi < count($LQpostrow); $LQi++)
{
$LQlastqueries .= "<a class='lastquery' href='http://".$_SERVER['SERVER_NAME']."/".$LQpostrow[$LQi]['translitkw'].".html'>".mb_convert_case($LQpostrow[$LQi]['kw'],MB_CASE_TITLE,'UTF-8')."</a>&nbsp;";
}

$pageTemplate = str_replace("[LASTQUERIES]", $LQlastqueries, $pageTemplate);




//print_r($_SERVER);
if(isPage()){
  include_once('playlist.php');

}else
if(isFirstLetter()){
  include_once('firstletter.php');
}else
if(isHome()){
  include_once('home.php');
}else
if(isSongsByGenre()){
  include_once('songsbygenre.php');
}else
if(isHits100()){
  include_once('hits100.php');
}else
if(isRadio()){
  include_once('radio.php');
}else{
  header( 'Location: http://'.$_SERVER['SERVER_NAME'].'/', true, 301 );
}
//print_r($_SERVER); echo $_SERVER['REQUEST_URI'];

echo $pageTemplate;


mysql_close($db);


?>