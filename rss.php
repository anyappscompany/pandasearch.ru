<?php     header("Content-type: text/xml; charset=utf-8");
$rss .='<?xml version="1.0" encoding="UTF-8"?>"
	>';
include_once("songsdb.php");
include_once("strings.php");
$result = mysql_query("SELECT * FROM (SELECT * FROM keywords ORDER BY id DESC LIMIT ".$rsstotal.") as tmp ORDER BY id DESC");

while ( $postrow[] = mysql_fetch_array($result));



// Задаем формат даты
define('DATE_FORMAT_RFC822','r');
// Сообщяем браузеру что передаем XML


// Дата последней сборки фида
$lastBuildDate=date(DATE_FORMAT_RFC822);

$rss = '

<rss version="2.0">
<channel>
    <title>'.$rsstitle.'</title>
    <link>'.$rsslink.'</link>
    <description>'.$rssdescription.'</description>
    <pubDate>'.$lastBuildDate.'</pubDate>
    <lastBuildDate>'.$lastBuildDate.'</lastBuildDate>
    <generator>'.$rssgenerator.'</generator>
    <copyright>'.$rsscopyright.'</copyright>
    <managingEditor>'.$rssmanagingeditor.'</managingEditor>
    <webMaster>'.$rsswebmaster.'</webMaster>
    <language>'.$rsslang.'</language>
';


for($i = 0; $i < count($postrow); $i++)
{
  if(mb_strlen($postrow[$i]['translitkw'],'utf-8')<=0)continue;
// Убираем из тайтла html теги и лишние пробелы
$title   = strip_tags(trim($postrow[$i]['kw']));
// С аноносом можно не проводить такие
// манипуляции, т.к. мы вставим его в блок CDATA
$anon    = $postrow[$i]['kw'];
$url     = "http://".$_SERVER['SERVER_NAME']."/".$postrow[$i]['translitkw'].".html";
$pubDate = date(DATE_FORMAT_RFC822, $postrow[$i]['lastupdate']);

$d1 = explode(" ", $postrow[$i]['lastupdate']);
$d2 = explode("-", $d1[0]);
$d3 = explode(":", $d1[1]);
$date=date("D, d M Y H:i:s", mktime($d3[0], $d3[1], $d3[2], $d2[1], $d2[2], $d2[0])) ."  GTM";

$rss .='
    <item>
        <title>'.$rssauthor.' - '.$title.$rssoneitemafter.'</title>
        <description><![CDATA['.$url.$rssoneitemafterdescription.']]></description>
        <link>http://'.$_SERVER['SERVER_NAME'].'/'.$postrow[$i]['translitkw'].'.html</link>
        <guid isPermaLink="true">http://'.$_SERVER['SERVER_NAME'].'/'.$postrow[$i]['translitkw'].'.html</guid>
        <pubDate>'.date(DATE_RSS, strtotime($postrow[$i]['lastupdate'])).'</pubDate>
    </item>';
}

$rss .= '</channel></rss>';

echo $rss;
/*for($i = 0; $i < count($postrow); $i++)
{
  if(strlen($postrow[$i]['translitkw'])>0){
echo "http://".$_SERVER['SERVER_NAME']."/".$postrow[$i]['translitkw'].".html<br />";
}
}*/

/*$RSSLenta='
 <?xml version="1.0"  encoding="UTF-8"?>
 <rss version="2.0">

 <channel>
 <title>'.$rsstitle.'</title>
 <link>'.$rsslink.'</link>
 <description>'.$rssdescription.'</description>
 <language>'.$rsslang.'</language>
';

//Запрос данных из базы
//$RSSnews=QueryFromDataBases;


for ($i = 0; $i < count($postrow); $i++){
  $d1 = explode(" ", $postrow[$i]['lastupdate']);
$d2 = explode("-", $d1[0]);
$d3 = explode(":", $d1[1]);
$date=date("D, d M Y H:i:s", mktime($d3[0], $d3[1], $d3[2], $d2[1], $d2[2], $d2[0])) ."  GTM";
 $RSSLenta.= "
 <item>
  <title>".$rsstitle."</title>
  <link>http://".$_SERVER['SERVER_NAME']."/".$postrow[$i]['translitkw'].".html</link>
  <description>".$postrow[$i]['kw']."</description>
  <pubDate>".$date."</pubDate>
 </item>
 ";
}

$RSSLenta.="
</channel>
</rss>";

echo $RSSLenta;
*/


mysql_close($db);
?>