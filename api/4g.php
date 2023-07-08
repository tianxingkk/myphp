<?php
header('Content-Type:text/json;charset=utf-8');
//header("Content-Type: application/x-mpegurl");

function getCurlResponse($url, $ua){
    $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);	
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
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

$id = $_GET['id'];	
$url = "http://95.sc1970.xyz/4g1.php?id=".$id."";
$UA = 'HSTVPlayer';
$response = getCurlResponse($url, $UA);

// Replace URL in response
$regex = '#(https?://[^\s"]+)#';
if (preg_match_all($regex, $response, $matches)) {
    foreach ($matches[1] as $match) {
        $new_url = base64_encode($match)."&dd=4.ts";
        $response = str_replace($match, "http://95.sc1970.xyz/flv64.php?id=".$new_url, $response);
    }
}
echo $response;
?>



https://4gtvfreemobile-cds.cdn.hinet.net/live/pool/4gtv-4gtv002/4gtv-live-mid/4gtv-4gtv002-avc1_2000000=3-mp4a_130000=7-begin=2670194080333334-dur=40000000-seq=66754853.ts?token1=4kXleGnhUZtX6T9ud6WcLw&expires1=1687133025"


https://4gtvfreemobile-cds.cdn.hinet.net/live/pool/4gtv-4gtv004/4gtv-live-mid/4gtv-4gtv004-avc1_2000000=3-mp4a_130000=7-begin=2670195360333334-dur=40000000-seq=66754885.ts?token1=Ul751UmxaG_-9MgRj2r-AA&expires1=1687133174