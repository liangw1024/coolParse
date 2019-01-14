<?php
$originalUrl = $_POST['url'];
if(!isset($originalUrl)){
	echo reponse(400,'please fill in url',null);
}else{
	
}
/**
*获取资源平台.
*/
function getSourcePlatform($url){
	$result = null;
	if(stristr($url,'v.qq.com')){
		$result = VideoPlatform::$tencentV;
	}else if(stristr($url,'youku')){
		$result = VideoPlatform::$youku;
	}else if(stristr($url,'url.cn')){
		$result = VideoPlatform::$qMusic;
	}else if(stristr($url,'douyin')){
		$result = VideoPlatform::$douyin;
	}
	return $result;
}

function reponse($code,$description,$data){
	$result = array('code'=>$code,
					'des'=>$description,
					'data'=>$data);
	return json_encode($result);
}
class VideoPlatform{
	public static $youku = 0;
	public static $tencentV = 1;
	public static $qMusic = 2;
	public static $douyin = 3;
}
