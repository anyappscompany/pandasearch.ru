<?php
$cachetime = 172800;          //3600 - 1h
$cachepath = 'cache/';
//$play = "Слушать";
$download = "Скачать";
//$duration = "Продолжительность";
//$genre = "Жанр";
$downloadAltTitleBefore = "Скачать изображение "; //  50-80 знаков (обычно — 75)
$downloadAltTitleAfter = "";
$pageTitleBefore = "";
$totalphotos = "Изображений найдено: ";
$pageTitleAfter = " изображений найдено на сайте ".$_SERVER['SERVER_NAME'];
$keywords = array('фото', 'изображения', 'аватары', 'иконки', 'текстуры', 'логотипы'); //до 250 (250 — максимум, ориентируйтесь на ударные первые 150 знаков).
$descriptionBefore = "Найдены изображения по запросу "; //около 150-200
$descriptionAfter = ". Поисковая система бесплатных фотографий, иконок, аватаров, текстур и логотипов. Изображения разных форматов в высоком качестве.";
$zeroresult = "Найдено 0 результатов.";
$pagenavih1 = "Изображения на букву ";
$text1 = "Поиск бесплатных изображений, фотографий, обоев, картинок, иконок, скринов, аватаров, чертежей. Пожалуйста, введите слово или предложение.";
$h1hometag = "Бесплатный поиск изображений в интернете";
$contenthometag = "Приветствуем Вас на сайте поисковой системы изображений, иконок, фотографий. Специально для уважаемых посетителей нашего сервиса мы создали полезную функцию, с помощью которой, можно не просто искать, а еще и загружать найденные фотографии к себе на компьютер, планшет или телефон. В отличие от аналогичных сайтов, мы за поиск фотографий не берем совсем никаких денег. Услуга предоставляется абсолютно бесплатно.";
//$genreshometxt = "Жанры";
$hometitle = "Панда Поисковый - бесплатный поиск изображений в интернете";
$homekeywords = "фото, изображения, аватары, картинки, текстуры";
$homedescription = "Поисковая система бесплатных фотографий, картинок, иконок в интернете. Просмотр картинок и возможность скачивания к себе на телефон, андроид, компьютер.";
$headertext = " на сайте <span style='text-transform: uppercase'>".$_SERVER['SERVER_NAME']."</span>";
$georegion = "RU";
$geoplacename = "Москва, ул. Ефремоваб д. 7";
$geoposition = "55.739204;37.622032";
$geoicbm = "55.739204, 37.622032";
$organizationname = "Самый быстрый отечественный поисковик изображений";
$organizationlocation = "Расположение:";
$streetaddress = "ул. Ефремова, д. 7";
$addresslocality = "Москва";
$addressregion = "Москва";
$phone = "Телефон:";
$phonenumber = "(495) 99-888-99 ";
$sitename = $_SERVER['SERVER_NAME'];
$socialnetworks = '<div class="share42init"></div><script type="text/javascript" src="http://'.$_SERVER['SERVER_NAME'].'/share42/share42.js"></script>';
$lastqueriestext = "Последние поиски: ";
/*ping*/
$psitename = "Панда Поисковый поиск изображений в интернете - ".$_SERVER['SERVER_NAME'];
$psiteurl = "http://".$_SERVER['SERVER_NAME'];
$ppageurl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$pfeedurl = "";
/*ping*/
$home = "Главная";
//$songsbygenre = "Песни по стилям и жанрам";
$hits100 = "Популярные картинки";
$hits100h1 = "100 популярных изображений ".$_SERVER['SERVER_NAME'];
//$songsbygenretitle = "Музыка по жанрам (скачать, прослушать) на сайте ".$_SERVER['SERVER_NAME'];
$firstlettertitle = "Изображения начинающиеся на букву ".$_GET['letter']." на сайте ".$_SERVER['SERVER_NAME'].". Страница "; if(is_numeric($_GET['page'])){$firstlettertitle.=$_GET['page'];}else{$firstlettertitle.="1";}
$hits100title = "100 самых популярных изображений по версии сайта ".$_SERVER['SERVER_NAME'];
$firstletterkeywords = "изображения по алфавиту, картинки по буквам, фото, аватары, иконки";
$firstletterdescription = "Изображения на букву ".$_GET['letter'].". Самые хорошие фото.";
$hits100description = "ТОП 100 изображений в интернете по версии сайта ".$_SERVER['SERVER_NAME'];
$hits100keywords = "фото, обои, лучшие обои, картинки, изображения";
//$radio = "Радио";
//$radioh1 = "Бесплатное радио";
//$radiotitle = "Бесплатное радио на сайте ".$_SERVER['SERVER_NAME'];
//$radiokeywords = "радио, бесплатно, слушать, прямой эфир, раздача, качество, фм";
//$radiodescription = "Бесплатное радио в хорошем качестве. Прямая трансляция онлайн эфиров.";
$urlliststotal = 1000;
$rsstitle = "PANDASEARCH.RU RSSFeed";
$rsslink = "http://".$_SERVER['SERVER_NAME'];
$rssdescription = "PANDASEARCH.RU - Поиск бесплатных изображений в интернете";
$rsstotal = 1000;
$rssauthor = "pandasearch.ru";
$rsslang = "ru-RU";
$rssgenerator = "pandasearch.ru 1.0";
$rsscopyright = "Copyright 2015 pandasearch.ru";
$rssmanagingeditor = "managingeditor@gmail.com (Arvind Chauhan)";
$rsswebmaster = "webmaster@gmail.com (Arvind Chauhan)";
$rssoneitemafter = " (поиск изображений, фото, иконок)";
$rssoneitemafterdescription = " искать фото, иконки, текстуры, картинки в интернете";
$titlesymbol = "❏ ";
$comments = "<div id=\"hypercomments_widget\"></div>
<script type=\"text/javascript\">
_hcwp = window._hcwp || [];
_hcwp.push({widget:\"Stream\", widget_id: 60571});
(function() {
if(\"HC_LOAD_INIT\" in window)return;
HC_LOAD_INIT = true;
var lang = (navigator.language || navigator.systemLanguage || navigator.userLanguage || \"en\").substr(0, 2).toLowerCase();
var hcc = document.createElement(\"script\"); hcc.type = \"text/javascript\"; hcc.async = true;
hcc.src = (\"https:\" == document.location.protocol ? \"https\" : \"http\")+\"://w.hypercomments.com/widget/hc/60571/\"+lang+\"/widget.js\";
var s = document.getElementsByTagName(\"script\")[0];
s.parentNode.insertBefore(hcc, s.nextSibling);
})();
</script>
<a href=\"http://hypercomments.com\" class=\"hc-link\" title=\"comments widget\">comments powered by HyperComments</a>";
?>