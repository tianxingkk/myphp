<?php
$data = str_replace($aryList[0][$i], $_SERVER['SCRIPT_NAME'] . '?id='.$id.'&url='.$aryList[0][$i], $data);

	定义('USER_AGENT', Mozilla/5.0（iPhone；CPU iPhone OS 13_2_3像Mac OS X）AppleWebKit/605.1. 15（KHTML，像壁虎）版本/13.0. 3 mobile/15E148 Safari/604.1');
$url = isset($_GET['url'])? $_GET['url'] : '';
$id = isset($_GET['id'])? $_GET['id'] : '';

如果（！isset（$id））{
回声 <<<'EOD'

EOD;
} 其他的 {
		
如果!preg_match/.*[0-9]{5，}\. ts$/', $url)) {
$data=撇($id)；
查询
查询
			
$url =
$id =
!
查询
			
查询
查询
$data =
$aryList =
$dwCount =
	
查询
$data =
查询
查询
查询
$data =
查询
		} 		
		curl_setopt($ch, CURLOPT_URL, $bstrURL);        
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);		
		curl_setopt($ch, CURLOPT_USERAGENT, USER_AGENT);
		curl_setopt($ch, CURLOPT_REFERER, "http://198.16.100.90"); 
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
?>
