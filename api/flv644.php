<?php
if(isset($_GET['id'])){
    $url = $_GET['id'];
        $decoded_id = base64_decode($url);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $decoded_id);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($ch, CURLOPT_USERAGENT, 'User-Agent: HSTVPlayer' );
    //curl_setopt($ch, CURLOPT_REFERER, 'https://www.ofiii.com/');
    $content = curl_exec($ch);
    curl_close($ch);
    header('Content-type: video/MP2T');
    echo $content;
}else{
    echo 'Invalid request';
}
?>