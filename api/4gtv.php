<?php
header('Content-Type:text/json;charset=utf-8');
header("Content-Type: application/x-mpegurl");

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
if(isset($_GET['id'])){
$id = $_GET['id'];	
$url = "http://tv.freeidc.ml/fans/4g1.php";
$UA = 'HSTVPlayer';
$response = getCurlResponse($url, $UA);
$response = str_replace("https://4gtvfreemobile-cds.cdn.hinet.net/live/pool/4gtv-4gtv001/4gtv-live-mid/4gtv-4gtv001-avc1_2000000=3", "http://tv.freeidc.ml/fans/hstvvv.php?id=".$id."4gtv-live-high".$id."-avc1_6000000=1", $response); 
}

echo $response;
?>

