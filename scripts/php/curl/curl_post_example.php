<?php        

$data = array(
	'abc'=> 'adsfa'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "url");
curl_setopt($ch, CURLOPT_POST, true); // 啟用POST
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$result = curl_exec($ch);
curl_close($ch);
echo $result;
