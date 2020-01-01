<?php
include_once("strings.php");
// раздел настроек, которые вы можете менять
$settings_cachedir = $cachepath;
$settings_cachetime = 3; //время жизни кэша (48 час)   172800     345600

// код
$thispage = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$thispagemd5 = md5($thispage);

$cachelink = $settings_cachedir.$thispagemd5[0].$thispagemd5[1].$thispagemd5[2].'/'.$thispagemd5[3].$thispagemd5[4].$thispagemd5[5].'/'.$thispagemd5.".html";
$folder1 = $settings_cachedir.$thispagemd5[0].$thispagemd5[1].$thispagemd5[2];
$folder2 = $settings_cachedir.$thispagemd5[0].$thispagemd5[1].$thispagemd5[2].'/'.$thispagemd5[3].$thispagemd5[4].$thispagemd5[5];
function translit_url($text) { preg_match_all('/./u', $text, $text); $text = $text[0]; $simplePairs = array( 'а' => 'a' , 'л' => 'l' , 'у' => 'u' , 'б' => 'b' , 'м' => 'm' , 'т' => 't' , 'в' => 'v' , 'н' => 'n' , 'ы' => 'y' , 'г' => 'g' , 'о' => 'o' , 'ф' => 'f' , 'д' => 'd' , 'п' => 'p' , 'и' => 'i' , 'р' => 'r' , 'А' => 'A' , 'Л' => 'L' , 'У' => 'U' , 'Б' => 'B' , 'М' => 'M' , 'Т' => 'T' , 'В' => 'V' , 'Н' => 'N' , 'Ы' => 'Y' , 'Г' => 'G' , 'О' => 'O' , 'Ф' => 'F' , 'Д' => 'D' , 'П' => 'P' , 'И' => 'I' , 'Р' => 'R' , ); $complexPairs = array( 'з' => 'z' , 'ц' => 'c' , 'к' => 'k' , 'ж' => 'zh' , 'ч' => 'ch' , 'х' => 'kh' , 'е' => 'e' , 'с' => 's' , 'ё' => 'jo' , 'э' => 'eh' , 'ш' => 'sh' , 'й' => 'jj' , 'щ' => 'shh' , 'ю' => 'ju' , 'я' => 'ja' , 'З' => 'Z' , 'Ц' => 'C' , 'К' => 'K' , 'Ж' => 'ZH' , 'Ч' => 'CH' , 'Х' => 'KH' , 'Е' => 'E' , 'С' => 'S' , 'Ё' => 'JO' , 'Э' => 'EH' , 'Ш' => 'SH' , 'Й' => 'JJ' , 'Щ' => 'SHH' , 'Ю' => 'JU' , 'Я' => 'JA' , 'Ь' => "" , 'Ъ' => "" , 'ъ' => "" , 'ь' => "" , ); $specialSymbols = array( "_" => "-", "'" => "", "`" => "", "^" => "", " " => "-", '.' => '', ',' => '', ':' => '', '"' => '', "'" => '', '<' => '', '>' => '', '«' => '', '»' => '', ' ' => '-', ); $translitLatSymbols = array( 'a','l','u','b','m','t','v','n','y','g','o', 'f','d','p','i','r','z','c','k','e','s', 'A','L','U','B','M','T','V','N','Y','G','O', 'F','D','P','I','R','Z','C','K','E','S', ); $simplePairsFlip = array_flip($simplePairs); $complexPairsFlip = array_flip($complexPairs); $specialSymbolsFlip = array_flip($specialSymbols); $charsToTranslit = array_merge(array_keys($simplePairs),array_keys($complexPairs)); $translitTable = array(); foreach($simplePairs as $key => $val) $translitTable[$key] = $simplePairs[$key]; foreach($complexPairs as $key => $val) $translitTable[$key] = $complexPairs[$key]; foreach($specialSymbols as $key => $val) $translitTable[$key] = $specialSymbols[$key]; $result = ""; $nonTranslitArea = false; foreach($text as $char) { if(in_array($char,array_keys($specialSymbols))) { $result.= $translitTable[$char]; } elseif(in_array($char,$charsToTranslit)) { if($nonTranslitArea) { $result.= ""; $nonTranslitArea = false; } $result.= $translitTable[$char]; } else { if(!$nonTranslitArea && in_array($char,$translitLatSymbols)) { $result.= ""; $nonTranslitArea = true; } $result.= $char; } } return strtolower(preg_replace("/[-]{2,}/", '-', $result)); } /*$str = iconv('UTF-8','windows-1251//TRANSLIT','Умляуты немецкого языка: aouAOU?eeu и Прочие: Cu?у? и т.д. (их очень много)'); $str = iconv('windows-1251','UTF-8',$str); echo translit_url ($str)*/;

//$cachelink = $settings_cachedir.md5($thispage).".html";

if (file_exists($cachelink)) {
    $cachelink_time = filemtime($cachelink);

    if ((time() - $settings_cachetime) < $cachelink_time) {
        readfile($cachelink);die();
    }
}

ob_start();
?>