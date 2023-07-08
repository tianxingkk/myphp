<?php
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
     }
