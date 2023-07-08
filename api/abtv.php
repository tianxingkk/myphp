<?php
    header("Content-Type: application/x-mpegurl");

	$url = isset($_GET['url'])? $_GET['url'] : '';
	$id = isset($_GET['id'])? $_GET['id'] : '';

if(!isset($id)) {
		echo <<<'EOD'

EOD;
	} else {
		
		if(!preg_match('/.*[0-9]{5,}\.ts$/', $url)) {
			$data = curl($id);
			$aryList = array();
			$dwCount = preg_match_all('/.*?\.ts/', $data, $aryList);
			
			for($i = 0; $i < $dwCount; $i++) {
				$data = str_replace($aryList[0][$i], $_SERVER['SCRIPT_NAME'] . '?id='.$id.'&url='.$aryList[0][$i], $data);
			}
			print_r($data);	
			
		} else {
			$data = curl($id, $url);
			print_r($data);
		}
	}
	
	function curl($id, $url = '') {
		$ch = curl_init();
		if($url) {
			$bstrURL = "https://z88.ubtvfans.com/live/".$id."/$url";
		} else {
			$bstrURL = "https://z88.ubtvfans.com/live/".$id."/index.m3u8";
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		} 		
		curl_setopt($ch, CURLOPT_URL, $bstrURL);        
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);		
		curl_setopt($ch, CURLOPT_USERAGENT,"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.132 Safari/537.36");
		curl_setopt($ch, CURLOPT_REFERER, ""); 
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
?>
