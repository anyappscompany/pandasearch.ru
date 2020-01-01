<?php
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

$api_id = '4938000';
$vk_id  = '166104317'; //это ID станицы, с которой вы создали своё приложение и получили доступ (описано в первом посте)

$VK = new vkapi($api_id, $vk_id);
$resp = $VK->api('audio.search', array(
        'q' => "hip", //сам запрос
        'auto_complete' => '1', //автоматическое исправление, если запрос в виде "Еру Иуфедуы" (The Beatles)
        'sort' => '2', // сортировка - по популярности
        'count' => '50', //количество результатов в ответе
        'offset' => '0', //оффсет (смещение, необходимо если делать постраничку или подгрузку на аяксе, ну это понятно)
        'format'=>'json'
    ));

echo ($resp);





























?>