<?php
$originalUrl = $_POST['url'];
if(!isset($originalUrl)){
	echo reponse(400,'please fill in url',null);
}else{
	$htmlSource = file_get_contents(get_redirect_url($originalUrl));
	echo $htmlSource;
}
/**
*获取Url的平台
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
function get_redirect_url($url){
    $redirect_url = null; 

    $url_parts = @parse_url($url);
    if (!$url_parts) return false;
    if (!isset($url_parts['host'])) return false; //can't process relative URLs
    if (!isset($url_parts['path'])) $url_parts['path'] = '/';

    $sock = fsockopen($url_parts['host'], (isset($url_parts['port']) ? (int)$url_parts['port'] : 80), $errno, $errstr, 30);
    if (!$sock) return false;

    $request = "HEAD " . $url_parts['path'] . (isset($url_parts['query']) ? '?'.$url_parts['query'] : '') . " HTTP/1.1\r\n"; 
    $request .= 'Host: ' . $url_parts['host'] . "\r\n"; 
    $request .= "Connection: Close\r\n\r\n"; 
    fwrite($sock, $request);
    $response = '';
    while(!feof($sock)) $response .= fread($sock, 8192);
    fclose($sock);

    if (preg_match('/^Location: (.+?)$/m', $response, $matches)){
        if ( substr($matches[1], 0, 1) == "/" )
            return $url_parts['scheme'] . "://" . $url_parts['host'] . trim($matches[1]);
        else
            return trim($matches[1]);

    } else {
        return false;
    }

}
