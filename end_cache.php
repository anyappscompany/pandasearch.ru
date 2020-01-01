<?php

//$result = array_merge($obj[0], $obj[1]);
//$result = array_merge($result, $obj[2]);
//$result = array_merge($result, $obj[3]);
//echo "total:".count($result);



if(!is_dir($folder1)){
mkdir($folder1, 0777);
}
if(!is_dir($folder2)){
mkdir($folder2, 0777);
}
$fp = fopen($cachelink, 'w');
fwrite($fp, ob_get_contents());
fclose($fp);
ob_end_flush();
?>