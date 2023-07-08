<?php
header('Content-Type:text/json;charset=utf-8');
$id = $_GET["id"];
$quality = $_GET["q"];
// 定义一个函数，用于获取指定 URL 的 HTML 内容
function get_data($url){
$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  

curl_setopt($ch, CURLOPT_USERAGENT, "facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)");
curl_setopt($ch, CURLOPT_REFERER, "http://facebook.com");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}
// 获取 YouTube 视频的 HTML 内容
$string = get_data('https://www.youtube.com/watch?v=' . $id);
// 从 HTML 内容中提取 M3U8 文件的链接
preg_match_all('/hlsManifestUrl(.*m3u8)/', $string, $matches, PREG_PATTERN_ORDER);
$rawURL = str_replace("\/", "/", substr($matches[1][0], 3));
// 根据视频质量参数值设置不同的正则表达式，以匹配相应的 M3U8 播放链接
switch ($quality) {

default:
    // 默认情况下使用高清视频
    $quality_regex = '/(https:\/.*\/96\/.*index.m3u8)/';
}
// 获取视频播放链接
preg_match_all($quality_regex, get_data($rawURL), $playURL, PREG_PATTERN_ORDER);
// 设置正确的 HTTP 响应头，将播放链接发送给客户端


function getCurlResponse($url, $ua){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);   
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  
    curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    $response = curl_exec($ch);
   
    if(curl_errno($ch)){
        $error = curl_error($ch); 
        curl_close($ch);
        return "cURL Error:".$error;
    }    
    $info = curl_getinfo($ch); 
    curl_close($ch);
    return $response;
}
if (isset($_GET['flv'])) {
    // 如果输入值是 php?flv=，则只执行代码2
    $flv = $_GET['flv'];
    $expires = $_GET['expires'];
    $token1 = $_GET['token1'];
    $expires1 = $_GET['expires1'];
                    $flv = base64_decode($flv);

    
    if(!empty($flv)){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $flv);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_USERAGENT, 'User-Agent: HSTVPlayer' );
        $content = curl_exec($ch);
        curl_close($ch);
        header('Content-type: video/MP2T');
        echo $content;
    } else {
        echo 'Invalid request';
    }
} else {
        header("Content-Type: application/x-mpegurl");

$url = "".$playURL[1][0]."";
$UA = 'HSTVPlayer';
$response = getCurlResponse($url, $UA);
    
// Replace URL in response
$regex = '#(https?://[^\s"]+)#';
if (preg_match_all($regex, $response, $matches)) {
    foreach ($matches[1] as $match) {
        $new_url = base64_encode($match)."";
        $response = str_replace($match, "yytb.php?flv=".$new_url, $response);
    }
}}
echo $response;



?>
