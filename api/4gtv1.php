<?php
$url = 'http://seb.sason.top/ptv/ftv.php?id=tw';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo '请求发生错误：' . curl_error($ch);
    exit;
}
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

curl_close($ch);

if ($httpCode === 301 || $httpCode === 302) {
    preg_match("/Location:(.*?)\n/i", substr($response, 0, $headerSize), $matches);

    if ($matches) {
    $redirectUrl = trim($matches[1]);
        $redirectUrl = strstr($redirectUrl, ',', true);
        $redirectUrl = str_replace("master.m3u8", "stream2.m3u8", $redirectUrl); 

    header('Location: ' . $redirectUrl);  

        //执行重定向 URL 的操作。
    } else {
    
    echo '无法找到重定向 URL';
    }
} else {
    echo '该链接没有重定向';
}
