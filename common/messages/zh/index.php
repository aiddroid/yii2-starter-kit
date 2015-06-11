<?php

$source = isset($argv[1]) ? $argv[1] : null;
$source or die("empty source file \nUsage:php ".basename(__FILE__)." sourcefile \n");
echo "translating $source \n";


$items = require $source;


$translated = array();

foreach($items as $key=>$value){
	$translate = translate($key);
	$translated[$key] = $translate;
	echo "{$key} => {$translate} \n";
	usleep(500000);
}

file_put_contents("t.{$source}",var_export($translated,true));


function translate($word){
	$url = "http://fanyi.baidu.com/v2transapi?from=en&to=zh&transtype=realtime&query={$word}";
	$ret = file_get_contents($url);
	$result = json_decode($ret,true);
	return isset($result['dict_result']['net_means'][0]['means']) ? $result['dict_result']['net_means'][0]['means'] : $result['trans_result']['data'][0]['dst'];
}
