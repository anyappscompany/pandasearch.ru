<?php
$pagecontent = "";
$num = 100;
$page = addslashes($_GET['page']);
$result = mysql_query("SELECT COUNT(id) FROM keywords WHERE firstletter='".addslashes(mysql_real_escape_string ($_GET['letter']))."'");
$totalit = mysql_result($result,0,0);
$posts = $totalit;
$total = intval(($posts - 1) / $num) + 1;
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// Вычисляем начиная к какого номера
// следует выводить сообщения
$start = $page * $num - $num;
// Выбираем $num сообщений начиная с номера $start
//echo $start." ".$num." ".($start+$num);
$result = mysql_query("SELECT id, kw, translitkw FROM keywords WHERE firstletter='".addslashes(mysql_real_escape_string ($_GET['letter']))."' LIMIT $start, $num");
// В цикле переносим результаты запроса в массив $postrow
while ( $postrow[] = mysql_fetch_array($result));
/********************************************************/
for($i = 0; $i < count($postrow); $i++)
{
$pagecontent .= "<a href='/".$postrow[$i]['translitkw'].".html'>".$postrow[$i]['kw']."</a><br />";
}

/******************************************************/
if ($page != 1) $pervpage = '<a href= http://'.$_SERVER['SERVER_NAME'].'/index.php?action=firstletter&letter='.$_GET['letter'].'&page=1><<</a>
                               <a href= http://'.$_SERVER['SERVER_NAME'].'/index.php?action=firstletter&letter='.$_GET['letter'].'&page='. ($page - 1) .'><</a> ';
// Проверяем нужны ли стрелки вперед
if ($page != $total) $nextpage = ' <a href= http://'.$_SERVER['SERVER_NAME'].'/index.php?action=firstletter&letter='.$_GET['letter'].'&page='. ($page + 1) .'>></a>
                                   <a href= http://'.$_SERVER['SERVER_NAME'].'/index.php?action=firstletter&letter='.$_GET['letter'].'&page=' .$total. '>>></a>';

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 2 > 0) $page2left = ' <a href= http://'.$_SERVER['SERVER_NAME'].'/index.php?action=firstletter&letter='.$_GET['letter'].'&page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = '<a href= http://'.$_SERVER['SERVER_NAME'].'/index.php?action=firstletter&letter='.$_GET['letter'].'&page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';
if($page + 2 <= $total) $page2right = ' | <a href= http://'.$_SERVER['SERVER_NAME'].'/index.php?action=firstletter&letter='.$_GET['letter'].'&page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a href= http://'.$_SERVER['SERVER_NAME'].'/index.php?action=firstletter&letter='.$_GET['letter'].'&page='. ($page + 1) .'>'. ($page + 1) .'</a>';

// Вывод меню
$pagecontent.= $pervpage.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$nextpage;






$pageTemplate = str_replace("[COMMENTS]", "", $pageTemplate);
$pageTemplate = str_replace("[CONTENT]", $pagecontent, $pageTemplate);
$pageTemplate = str_replace("[H1TAG]", $pagenavih1.$_GET['letter'], $pageTemplate);
$pageTemplate = str_replace("[CURRENTSEARCH]", "", $pageTemplate);
$pageTemplate = str_replace("[TITLE]", $firstlettertitle, $pageTemplate);
$pageTemplate = str_replace("[KEYWORDS]", $firstletterkeywords, $pageTemplate);
$pageTemplate = str_replace("[DESCRIPTION]", $firstletterdescription, $pageTemplate);
?>