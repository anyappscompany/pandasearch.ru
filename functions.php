<?php

function isHome(){
  if($_SERVER[REQUEST_URI]=="/"){
    return true;
  }else{
    return false;
  }
}
function isFirstLetter(){
  if(isset($_GET['action']) && isset($_GET['letter']) && $_GET['action']=="firstletter"){
    return true;
  }else{
    return false;
  }
}
function isPage(){
  if(preg_match("|^\/[A-Za-z0-9-]+\.html$|", $_SERVER['REQUEST_URI']) && $_SERVER['argc'] == 0){
    return true;
  }else{
    return false;
  }
}

function isSongsByGenre(){
   if(($_SERVER['REQUEST_URI']=='/songsbygenre') && ($_SERVER['argc'] == 0)){
    return true;
  }else{
    return false;
  }
}

function isHits100(){
  if(($_SERVER['REQUEST_URI']=='/hits100') && ($_SERVER['argc'] == 0)){
    return true;
  }else{
    return false;
  }
}

function isRadio(){
  if(($_SERVER['REQUEST_URI']=='/radio') && ($_SERVER['argc'] == 0)){
    return true;
  }else{
    return false;
  }
}

function get_web_page( $url )
{
  $uagent = "Opera/9.80 (Windows NT 6.1; WOW64) Presto/2.12.388 Version/12.14";

  $ch = curl_init( $url );

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);   // возвращает веб-страницу
  curl_setopt($ch, CURLOPT_HEADER, 0);           // не возвращает заголовки
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);   // переходит по редиректам
  curl_setopt($ch, CURLOPT_ENCODING, "");        // обрабатывает все кодировки
  curl_setopt($ch, CURLOPT_USERAGENT, $uagent);  // useragent
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120); // таймаут соединения
  curl_setopt($ch, CURLOPT_TIMEOUT, 120);        // таймаут ответа
  curl_setopt($ch, CURLOPT_MAXREDIRS, 10);       // останавливаться после 10-ого редиректа

  $content = curl_exec( $ch );
  $err     = curl_errno( $ch );
  $errmsg  = curl_error( $ch );
  $header  = curl_getinfo( $ch );
  curl_close( $ch );

  $header['errno']   = $err;
  $header['errmsg']  = $errmsg;
  $header['content'] = $content;
  return $header;
}

function sendcaptcha($jsonVK, $tappid, $tvkid, $capchakey){
  $vkContentArray = json_decode($jsonVK , true);

//print_r ($vkContentArray["error"]["request_params"]);
//echo "<hr />";
$paramsarray = array();  //массив параметров
//print_r ($vkContentArray["error"]["request_params"][0]["key"]);
foreach($vkContentArray["error"]["request_params"] as $pr){
  //array_push($paramsarray, $pr["key"]=> $pr["value"]);
  $paramsarray[$pr["key"]] = $pr["value"];
}
//print_r($paramsarray);
//echo $vkContentArray["error"]["captcha_img"]."<br />";
//echo $vkContentArray["error"]["captcha_sid"];
include_once('anticaptcha.php');

try {
// 5a2e55b49179076bc702342412cf5cbc - ключ AntiCaptcha
$ac = new AntiCaptcha($capchakey);

// Необходимо задать ограничивающие параметры
$ac->numeric = true;
$ac->min_len = 4;
$ac->max_len = 5;

// Получить картинку каптчи
$captcha = file_get_contents($vkContentArray["error"]["captcha_img"]);

// Расшифровывать налету
//echo "Start auto recognizing\r\n";
$code = $ac->recognize($captcha, true);
//echo "Recognized code - ".$code."\r\n";
// Сохранить каптчу в файл
/*file_put_contents('./captcha.png', $captcha);

// Расшифровывать из файла
echo "Start file recognizing\r\n";
$code = $ac->recognize('./captcha.png');
echo "Recognized code - ".$code."\r\n";*/
} catch (Exception $e) {
// Обработать исключения
echo $e->getMessage();
}

$paramsarray['captcha_sid'] = $vkContentArray["error"]["captcha_sid"];
$paramsarray['captcha_key'] = $code;

$VK = new vkapi($tappid, $tvkid);
      $jsonVK = $resp = $VK->api('audio.search', array(
        'q' => urldecode ($paramsarray['q']), //сам запрос
        'auto_complete' => $paramsarray['auto_complete'], //автоматическое исправление, если запрос в виде "Еру Иуфедуы" (The Beatles)
        'sort' => $paramsarray['sort'], // сортировка - по популярности
        'count' => $paramsarray['count'], //количество результатов в ответе
        'offset' => $paramsarray['offset'], //оффсет (смещение, необходимо если делать постраничку или подгрузку на аяксе, ну это понятно)
        'format'=>$paramsarray['format'],
        'captcha_sid'=>$paramsarray['captcha_sid'],
        'captcha_key'=>$code
    ));


return $jsonVK;
}

function translitIt($str)
{   //ГОСТ 7.79-2000
    $tr = array(
                "Є"=> "YE",
            "І"=> "I",
            "Ѓ"=> "G",
            "і"=> "i",
            "№"=> "",
            "є"=> "ye",
            "ѓ"=> "g",
            "А"=> "A",
            "Б"=> "B",
            "В"=> "V",
            "Г"=> "G",
            "Д"=> "D",
            "Е"=> "E",
            "Ё"=> "YO",
            "Ж"=> "ZH",
            "З"=> "Z",
            "И"=> "I",
            "Й"=> "J",
            "К"=> "K",
            "Л"=> "L",
            "М"=> "M",
            "Н"=> "N",
            "О"=> "O",
            "П"=> "P",
            "Р"=> "R",
            "С"=> "S",
            "Т"=> "T",
            "У"=> "U",
            "Ф"=> "F",
            "Х"=> "X",
            "Ц"=> "C",
            "Ч"=> "CH",
            "Ш"=> "SH",
            "Щ"=> "SHH",
            "Ъ"=> "",
            "Ы"=> "Y",
            "Ь"=> "",
            "Э"=> "E",
            "Ю"=> "YU",
            "Я"=> "YA",
            "а"=> "a",
            "б"=> "b",
            "в"=> "v",
            "г"=> "g",
            "д"=> "d",
            "е"=> "e",
            "ё"=> "yo",
            "ж"=> "zh",
            "з"=> "z",
            "и"=> "i",
            "й"=> "j",
            "к"=> "k",
            "л"=> "l",
            "м"=> "m",
            "н"=> "n",
            "о"=> "o",
            "п"=> "p",
            "р"=> "r",
            "с"=> "s",
            "т"=> "t",
            "у"=> "u",
            "ф"=> "f",
            "х"=> "x",
            "ц"=> "c",
            "ч"=> "ch",
            "ш"=> "sh",
            "щ"=> "shh",
            "ъ"=> "",
            "ы"=> "y",
            "ь"=> "",
            "э"=> "e",
            "ю"=> "yu",
            "я"=> "ya",
            "«"=> "",
            "»"=> "",
            "—"=> "-",
            " — "=> "-",
            " - "=> "-",
            " "=> "-",
            "..."=> "",
            ".."=> "",
            ":"=> "",
            "\""=> "",
            ","=> "",
            "!"=> "",
            ";"=> "",
            "%"=> "",
            "?"=> "",
            "*"=> "",
            "("=> "",
            ")"=> "",
            "\\"=> "",
            "/"=> "",
            "="=> "",
            "'"=> "",
            "&"=> "",
            "^"=> "",
            "$"=> "",
            "#"=> "",
            "@"=> "",
            "~"=> "",
            "`"=> "",
            " "=> "-",
            "."=> "",
            "+"=> "",
    );
    return strtolower(strtr($str,$tr));
}

function mySetLocale(){
  $locales   = array(
                    "ru_RU.UTF8",
                    "Russian_Russia.65001",
                    "Russian_Russia.UTF8",
                    "ru_RU.UTF-8"
                    );

$setFlag = false;

foreach ($locales as $localeName) {

    if ($setFlag === false) {
        // Выполняем установку локали
        setlocale(LC_ALL, $localeName);
    }

    // Провреряем, установлена ли локаль
    if ($setFlag === false &&
            //(mb_strtolower("qwertyёЁАБГДЯQWERTYZ") === "qwertyёёабгдяqwertyz")
            //||
            preg_match("/^[а-яЁё]+$/ui", strftime("%a"))
            ) {
        // Локаль установлена корректно
        $setFlag = true;
        break;
    }
}

if ($setFlag !== true) {
    // Ошибка, локаль не установлена
    echo "<p>Fatal error: PHP can't setup locale to Russian UTF8 character set (ru_RU.UTF8 for *nix OS, Russian_Russia.65001 for Windows OS). This locale is missing or operation system not supported it.</p><ul><li>To fix this error on Linux OS edit file /etc/locale.gen and add line <b>ru_RU.UTF8 UTF8</b> (or uncomment this line) and run <b>locale-gen</b> (root privileges required);</li><li>For Debian based Linux (Debian, Ubuntu etc...) use  <b>dpkg-reconfigure locales</b> command for configuring locales (root privileges required);</li><li>For FreeBSD use <b>locale-gen ru_RU.UTF8</b> (root privileges required);</li><li>For Windows OS install locale from Control pannel -> Languages and Regions section (administrator privileges required).</li></ul><p>Please contact with server administrator and notify him about this error</p>";
    exit();
}

setlocale(LC_NUMERIC, "C"); // for float numeric
ini_set("mbstring.internal_encoding", "utf8");
}

function my_ucfirst($string, $e ='utf-8') {
        if (function_exists('mb_strtoupper') && function_exists('mb_substr') && !empty($string)) {
            $string = mb_strtolower($string, $e);
            $upper = mb_strtoupper($string, $e);
            preg_match('#(.)#us', $upper, $matches);
            $string = $matches[1] . mb_substr($string, 1, mb_strlen($string, $e), $e);
        } else {
            $string = ucfirst($string);
        }
        return $string;
    }

function pingNews($siteName, $siteURL, $pageURL, $feedURL){

require('IXR_Library.php');
/**
* Яндекс.Блоги
*/
$pingClient = new IXR_Client('ping.blogs.yandex.ru', '/RPC2');

// Посылаем challange-запрос
if (!$pingClient->query('weblogUpdates.ping', $siteName, $siteURL, $pageURL)) {
    //echo 'Ошибка ping-запроса [' .
    $pingClient->getErrorCode().'] '.$pingClient->getErrorMessage();
}
else {
    //echo 'Послан ping Яндексу';
}

/**
* Google
*/
$pingClient = new IXR_Client('blogsearch.google.com', '/ping/RPC2');

// Посылаем challange-запрос
if (!$pingClient->query('weblogUpdates.extendedPing',
        $siteName, $siteURL, $pageURL, $feedURL)) {
    //echo 'Ошибка ping-запроса [' .
    //$pingClient->getErrorCode().'] '.$pingClient->getErrorMessage();
}
else {
    //echo 'Послан ping Google';
}
}



/**
 * VKAPI class for vk.com social network
 *
 * @package server API methods
 * @autor http://muhmundr.com/
 * @version 2.0
 */

function Send_Post($post_url, $post_data, $refer)
{

//print $post_data;

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $post_url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_REFERER, $refer);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
  //curl_setopt($ch, CURLOPT_PROXY, "72.162.36.14:8080");
  curl_setopt($ch, CURLOPT_USERAGENT,'Opera/9.80 (Windows NT 5.1; U; ru) Presto/2.2.15 Version/10.00');

  $data = curl_exec($ch);
  curl_close($ch);

  return $data;
}

class vkapi {
  var $vk_id;
  var $app_id;
	var $api_url;

	function vkapi($app_id, $vk_id, $api_url = 'api.vk.com/api.php') {
		$this->app_id = $app_id;
		$this->vk_id = $vk_id;
		if (!strstr($api_url, 'http://')) $api_url = 'http://'.$api_url;
		$this->api_url = $api_url;
	}

	function api($method,$params=false) {
		if (!$params) $params = array();
		$params['api_id'] = $this->app_id;
		$params['v'] = '3.0';
		$params['test_mode']='1';
		$params['method'] = $method;
        $params['format'] = 'json';
        //$params['captcha_sid'] = '114925637920';
        //$params['captcha_key'] = 'zy4se';

		ksort($params);
		$sig = $this->vk_id;
		foreach($params as $k=>$v) {
			$sig .= $k.'='.$v;
		}
		$params['sig'] = md5($sig);
		$res = Send_Post($this->api_url,$this->params($params),'http://vk.com/app'.$this->app_id.'_'.$this->app_id);
		return $res;
	}

	function params($params) {
		$pice = array();
		foreach($params as $k=>$v) {
			$pice[] = $k.'='.urlencode($v);
		}
		return implode('&',$pice);
	}
}

function muzlog($script, $msg, $color){
    $file = "muzlog/newlog".date("Y-m-d").".txt";
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

    //$curscript = $_SERVER['PHP_SELF'];

    file_put_contents($file, PHP_EOL .$curTime.";;;;;".$ip.";;;;;".$script.";;;;;".getUrl().";;;;;".$ua."", FILE_APPEND);
//if($ip != '176.8.213.163'){
  //file_put_contents($file, PHP_EOL ."<tr><td class='time'>".$curTime."</td><td class='ip'>".$ip."</td><td class='url'>".getUrl()."</td><td class='ua'>".$ua."</td></tr>", FILE_APPEND);
//}
}

function unescapeUTF8EscapeSeq($str) {
    return preg_replace_callback("/\\\u([0-9a-f]{4})/i",
        create_function('$matches',
            'return html_entity_decode(\'&#x\'.$matches[1].\';\', ENT_QUOTES, \'UTF-8\');'
        ), $str);
}
?>