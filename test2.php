<?php
$vkContentArray = json_decode('{"error":{"error_code":14,"error_msg":"Captcha needed","request_params":[{"key":"api_id","value":"4938000"},{"key":"auto_complete","value":"1"},{"key":"count","value":"1000"},{"key":"format","value":"json"},{"key":"method","value":"audio.search"},{"key":"offset","value":"0"},{"key":"q","value":"MC Doni Борода"},{"key":"sort","value":"2"},{"key":"test_mode","value":"1"},{"key":"v","value":"3.0"}],"captcha_sid":"896748174445","captcha_img":"http:\/\/api.vk.com\/captcha.php?sid=896748174445&s=1"}}' , true);
//$s = 'Imagine Dragons  - Demons (Dzeko &amp; Torres &#39;Sunset&#39; Remix)';
//echo $vkContentArray["error"]['error_code'];
$url = "http://cs9-15v4.vk.me/p17/de2837080a191f.mp3?extra=nn1OkLH95siEkmqqO_EIknJuLZPfx70zeuvxQPUSj0k5Kz0CAU4eL70hnVg81X-lyLevaLo02xq3zy444_LZxhhleDUuQhPg";
$Headers = @get_headers($url);
// проверяем ли ответ от сервера с кодом 200 - ОК
//if(preg_match("|200|", $Headers[0])) { // - немного дольше :)
if($Headers[18] === 'HTTP/1.1 200 OK') {
echo "Файл существует";
} else {
echo "Файл не найден";
}
echo $Headers[21]."<hr />";
print_r($Headers);

die;
print_r ($vkContentArray["error"]["request_params"]);
echo "<hr />";
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
$ac = new AntiCaptcha('bddac18321290e11935e886c5e26b40c');

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

$VK = new vkapi("4938000", "166104317");
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


echo "vv".$jsonVK;

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
  //curl_setopt($ch, CURLOPT_PROXY, "52.11.167.248:3128");
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
?>