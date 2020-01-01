<?php
$pageTemplate = str_replace("[CURRENTSEARCH]", "", $pageTemplate);
$pageTemplate = str_replace("[H1TAG]", $h1hometag, $pageTemplate);

$pageTemplate = str_replace("[TITLE]", $hometitle, $pageTemplate);
$pageTemplate = str_replace("[KEYWORDS]", $homekeywords, $pageTemplate);
$pageTemplate = str_replace("[DESCRIPTION]", $homedescription, $pageTemplate);
$pageTemplate = str_replace("[COMMENTS]", "", $pageTemplate);

$genreshome .= "<h2>".$genreshometxt."</h2>";
$genreshomehtml = "
<div class='homegenre'><a href='http://".$_SERVER['SERVER_NAME']."/odesskij-opernyj-teatr-foto.html'><img src='http://".$_SERVER['SERVER_NAME']."/images/odesskij-opernyj-teatr-foto.jpg' alt='Одесский Оперный Теaтр фото' title='Одесский Оперный Теaтр фото' /><br />Одесский Оперный Теaтр фото</a></div>
<div class='homegenre'><a href='http://".$_SERVER['SERVER_NAME']."/mylnyj-puzyr-foto.html'><img src='http://".$_SERVER['SERVER_NAME']."/images/mylnyj-puzyr-foto.jpg' alt='Мыльный пузырь фото' title='Мыльный пузырь фото' /><br />Мыльный пузырь фото</a></div>
<div class='homegenre'><a href='http://".$_SERVER['SERVER_NAME']."/sobaki-stafarshirskie-terery-foto.html'><img src='http://".$_SERVER['SERVER_NAME']."/images/sobaki-stafarshirskie-terery-foto.jpg' alt='Собаки стафарширские терьеры фото' title='Собаки стафарширские терьеры фото' /><br />Собаки стафарширские терьеры фото</a></div>
<div class='homegenre'><a href='http://".$_SERVER['SERVER_NAME']."/kodi-kesh-foto-akter.html'><img src='http://".$_SERVER['SERVER_NAME']."/images/kodi-kesh-foto-akter.jpg' alt='Коди Кэш фото актер' title='Коди Кэш фото актер' /><br />Коди Кэш фото актер</a></div>
<div class='homegenre'><a href='http://".$_SERVER['SERVER_NAME']."/tatyana-dogileva-foto.html'><img src='http://".$_SERVER['SERVER_NAME']."/images/tatyana-dogileva-foto.jpg' alt='Татьяна Догилева фото' title='Татьяна Догилева фото' /><br />Татьяна Догилева фото</a></div>
<div class='homegenre'><a href='http://".$_SERVER['SERVER_NAME']."/kateter-dlya-oksigenoterapii-foto.html'><img src='http://".$_SERVER['SERVER_NAME']."/images/kateter-dlya-oksigenoterapii-foto.jpg' alt='Катетер для оксигенотерапии фото' title='Катетер для оксигенотерапии фото' /><br />Катетер для оксигенотерапии фото</a></div>

";
$pageTemplate = str_replace("[CONTENT]", $contenthometag.$genreshome.$genreshomehtml, $pageTemplate);
?>