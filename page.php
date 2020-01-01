<?php
include_once('functions.php');
$arr = array();

$kw = base64_decode($_GET['photo']);
$url = "https://images.search.yahoo.com/search/images?p=".$kw;
$result = get_web_page($url);

//print_r($result['content']);

preg_match_all('/"tw":"(?<width>.*?)","th":"(?<height>.*?)"(.*?)ith":"(?<tumb>.*?)","rb(.*?)&imgurl=(?<url>.*?)&rurl=/',$result['content'] , $out);
//print_r($out);

for($i = 0; $i<count($out[0]);$i++){
    $arr_tmp = array();
    $arr_tmp['tumb'] = unescapeUTF8EscapeSeq(str_replace("\/", "/", $out['tumb'][$i]));
    $arr_tmp['h'] = $out['height'][$i];
    $arr_tmp['w'] = $out['width'][$i];
    $arr_tmp['url'] = "http://".urldecode($out['url'][$i]);
    $arr[0][]= $arr_tmp;
    //print_r($out['tumb'][$i]);
}

echo base64_encode(json_encode($arr, 256));

?>