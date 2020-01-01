<?php

$pageTemplate = str_replace("[CURRENTSEARCH]", "", $pageTemplate);
$pageTemplate = str_replace("[H1TAG]", $hits100h1, $pageTemplate);
$pageTemplate = str_replace("[TITLE]", $hits100title, $pageTemplate);
$pageTemplate = str_replace("[COMMENTS]", "", $pageTemplate);
$hits100content = "";

$result100 = mysql_query("SELECT * FROM keywords ORDER BY totalviews DESC LIMIT 100");
while ( $postrow100[] = mysql_fetch_array($result100));
for($i100 = 0; $i100 < count($postrow100)-1; $i100++)
{
$hits100content .= ($i100+1).") <a href='http://".$_SERVER['SERVER_NAME']."/".$postrow100[$i100]['translitkw'].".html'>".$postrow100[$i100]['kw']."</a><br />";
}


$pageTemplate = str_replace("[CONTENT]", $hits100content, $pageTemplate);
$pageTemplate = str_replace("[KEYWORDS]", $hits100keywords, $pageTemplate);
$pageTemplate = str_replace("[DESCRIPTION]", $hits100description, $pageTemplate);
?>