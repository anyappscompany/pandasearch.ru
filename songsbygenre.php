<?php
$arrayF = array("Open Sans", "Roboto", "Oswald", "Lato", "Roboto Condensed", "PT Sans", "Droid Sans", "Source Sans Pro", "Raleway", "Ubuntu", "Montserrat", "PT Sans Narrow", "Roboto Slab", "Lora", "Arimo", "Bitter", "Arvo", "
Oxygen", "Merriweather", "Lobster", "Titillium Web", "Noto Sans", "Indie Flower", "Dosis", "PT Serif", "Francois One", "Fjalla One", "Cabin", "Playfair Display", "Signika", "Shadows Into Light", "
Inconsolata", "Vollkorn", "Muli", "Josefin Sans", "Nunito", "Abel", "Rokkitt", "Bree Serif", "Play", "Ubuntu Condensed", "Cuprum", "Libre Baskerville", "Archivo Narrow", "Varela Round", "News Cycle", "
Poiret One", "Maven Pro", "Slabo", "Anton", "Exo 2", "Pacifico", "Asap", "Karla", "Noto Serif", "Gloria Hallelujah", "Questrial", "Dancing Script", "Merriweather Sans", "Alegreya", "PT Sans Caption", "
Droid Sans Mono", "Exo", "Quattrocento Sans", "Istok Web", "Armata", "Pathway Gothic One", "Economica", "Coming Soon", "Quicksand", "Architects Daughter", "Crimson Text", "Hammersmith One", "Changa One", "
Nobile", "Monda", "Gudea", "Ubuntu Mono", "Sanchez", "Cabin Condensed", "Ropa Sans", "Marvel", "Noticia Text", "Squada One", "Pontano Sans", "Slabo 13px", "Playball", "Josefin Slab", "Rambla", "
Amatic SC", "Righteous", "Satisfy", "Kreon", "Fredoka One", "Cantarell", "Source Code Pro", "Lobster Two", "Permanent Marker", "Patua One", "Old Standard TT", "Rajdhani", "Philosopher", "Glegoo", "
Courgette", "Black Ops One", "Comfortaa", "Paytone One", "EB Garamond", "Orbitron", "BenchNine", "Rock Salt", "Didact Gothic", "Chewy", "Tinos", "Special Elite", "Yellowtail", "Abril Fatface", "
Shadows Into Light Two", "Domine", "Crafty Girls", "Amaranth", "Sintony", "Bevan", "Varela", "Voltaire", "Trocchi", "Passion One", "Montserrat Alternates", "Kotta One", "Bangers", "Cookie", "
Covered By Your Grace", "Handlee", "Nixie One", "Pinyon Script", "Antic Slab", "Sigmar One", "Actor", "Cinzel", "Molengo", "Vidaloka", "Patrick Hand", "Quattrocento", "Carrois Gothic", "Luckiest Guy", "
Calligraffitti", "Reenie Beanie", "Walter Turncoat", "Cutive", "Kaushan Script", "Alfa Slab One", "Enriqueta", "Alegreya Sans", "Scada", "Jura", "Carme", "Tangerine", "Cherry Cream Soda", "
Viga", "Cantata One", "Homemade Apple", "Niconne", "Bubblegum Sans", "Syncopate", "Chivo", "Sorts Mill Goudy", "Signika Negative", "ABeeZee", "Allerta", "Marck Script", "Waiting for the Sunrise", "
Neucha", "Doppio One", "Arapey", "Jockey One", "Archivo Black", "Copse", "Neuton", "Playfair Display SC", "Russo One", "Goudy Bookletter 1911", "Audiowide", "PT Serif Caption", "Lusitana", "
Nothing You Could Do", "Coda", "Great Vibes", "Gochi Hand", "Michroma", "Monoton", "Coustard", "Ultra", "Telex", "Marmelad", "Allerta Stencil", "Kameron", "Damion", "Sacramento");

$pageTemplate = str_replace("[CURRENTSEARCH]", "", $pageTemplate);
$pageTemplate = str_replace("[H1TAG]", $songsbygenre, $pageTemplate);
$pageTemplate = str_replace("[TITLE]", $songsbygenretitle, $pageTemplate);
$pageTemplate = str_replace("[COMMENTS]", "", $pageTemplate);

$namesofgenres = array('Инди поп', 'Классическая музыка', 'Регги', 'Акустика вокал', 'Этническая музыка', 'Шансон', 'Транс', 'Драм н бэйс', 'Джаз Блюз', 'Дабстеп', 'Альтернативная музыка', 'Метал', 'Инструментальная музыка', 'Танцевальная музыка', 'Расслабляющая музыка', 'Рэп Хип Хоп', 'Поп', 'Рок',
'Песни из фильмов', 'Детские песни', 'Минусовки песен' , 'Ремиксы' , 'Ретро музыка' , 'Клубные песни' , 'Позитивные песни' , 'Хиты' , 'Русский рок' , 'Рок н Ролл' , 'Медленные песни' , 'Электронные песни' , 'Техно' , 'Хаус' , 'Фанк' , 'Хард рок' , 'Панк' , 'Бардовские песни' , 'Ambient' , 'Chillout' , 'Soul' , 'Евродэнс' , 'Трэш метал' , 'Клубная музыка',
'Романсы', 'Гимны', 'День Победы', 'Новогодние песни', 'Песни о войне', 'Частушки', 'Школьные песни', 'Армянские народные песни', 'Белорусские народные песни', 'Еврейские народные песни', 'Казахские песни', 'Литовские народные песни', 'Немецкие народные песни', 'Русские народные песни', 'Татарские народные песни', 'Украинские песни', 'Эстонские народные песни'
);
shuffle($namesofgenres);
$allgenres = "";
for($k=0;$k<count($namesofgenres);$k++){
  $myfont = $arrayF[rand(0, count($arrayF)-1)];
  $myfontsize = rand(10,40);
  $allgenres .= '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.$myfont.'">';
  $allgenres .= "<a class='coloredgenres' href='http://".$_SERVER['SERVER_NAME']."/".translitIt($namesofgenres[$k]).".html'><span style='color:".sprintf( '#%02X%02X%02X', rand(0, 255), rand(0, 255), rand(0, 255) )."; font-family: ".$myfont."; font-size:".$myfontsize."px'>".$namesofgenres[$k]."</span></a>&nbsp;";
}

$pageTemplate = str_replace("[CONTENT]", $allgenres, $pageTemplate);
?>