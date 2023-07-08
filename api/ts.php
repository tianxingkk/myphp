<?php
if(isset($_GET['id'])){
    $url = $_GET['id'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($ch, CURLOPT_USERAGENT, 'User-Agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36 Edg/109.0.1518.78' );
    //curl_setopt($ch, CURLOPT_REFERER, 'https://www.ofiii.com/');
    $content = curl_exec($ch);
    curl_close($ch);
    header('Content-type: video/avc');
    echo $content;
}else{
    echo 'Invalid request';
}
?>
