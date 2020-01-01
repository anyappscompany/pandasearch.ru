<?php
$pageTemplate = str_replace("[CURRENTSEARCH]", "", $pageTemplate);
$pageTemplate = str_replace("[H1TAG]", $radioh1, $pageTemplate);
$pageTemplate = str_replace("[TITLE]", $radiotitle, $pageTemplate);
$pageTemplate = str_replace("[COMMENTS]", $comments, $pageTemplate);
$radiocontent = "";
$resultradio = mysql_query("SELECT * FROM radio ORDER BY genre");

$radiocontent .= "<table id='radiotable'><tr><td class='titleradio'>Название станции</td><td class='titleradio'>Жанр</td><td class='titleradio'>Язык</td></tr>";
while ( $postrowradio[] = mysql_fetch_array($resultradio));
for($iradio = 0; $iradio < count($postrowradio)-1; $iradio++)
{
  $radiocontent .= "<tr class='lineradio' id='rad".$postrowradio[$iradio]['id']."' onclick='playradio(\"".$postrowradio[$iradio]['source']."\", \"rad".$postrowradio[$iradio]['id']."\")'>";
$radiocontent .= "<td>".$postrowradio[$iradio]['stationname']."<br /><p class='radiodescription'>".$postrowradio[$iradio]['description']."</p></td>"."<td>".$postrowradio[$iradio]['genre']."</td><td>".$postrowradio[$iradio]['language']."</td>";

$radiocontent .= "</tr>";
}
$radiocontent .= "</table>";
$pageTemplate = str_replace("[CONTENT]", $radiocontent, $pageTemplate);
$pageTemplate = str_replace("[KEYWORDS]", $radiokeywords, $pageTemplate);
$pageTemplate = str_replace("[DESCRIPTION]", $radiodescription, $pageTemplate);


?>