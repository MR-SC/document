<?php

class ApiController extends BaseController {


	public function saveToken()
	{

	}

	public function sendPushToAndroid()
	{

		//old key: $apiKey = 'AIzaSyCFikPOPY8ETxHIM-Gs3F9y8TTdyU7qvEY';
		//buy
		//$apiKey = 'AIzaSyAEs5sl10SI3II46_7lyrUbHmJUgTV8kgg';

		//fish
		$apiKey = 'AIzaSyDRLRXehxq-OQCLzzzsLG6dWJl7kr7GvHQ';
		
		$gcm_server = 'https://android.googleapis.com/gcm/send';	
		$regIDs = array();
		//$tokens = tokenBuy::where('device', '=', 1)->take(100)->get();
		$tokens = tokenFish::where('device', '=', 1)->take(100)->get();
		
		foreach ($tokens as $t){
			array_push($regIDs, $t->device_token);
		}
		
		$message = 'aa';
		$title = 'cc';	
		$description = 'dd';	
		$url = "xxx";

		$fields = array(
			'registration_ids'=> $regIDs,
			'delay_while_idle'=> true,
			'collapse_key'=> 'buy',
			'data'=> array(
				'payload' => array(
					'title' => "xxx",
					'url' => $url,
					'alert'=> "test alert",
					'badge' => 1,
					'vibrate' => 1,
					'source'=>'kuoapp'
				)
			)	
		);
		
		$headers = array(
			'Content-Type: application/json',
			'Authorization:key='.$apiKey
		);
		$ch = curl_init();
		 
		curl_setopt( $ch, CURLOPT_URL, $gcm_server );
		curl_setopt( $ch, CURLOPT_POST, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	//	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);
		
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
		 
		$result = curl_exec($ch);
		curl_close($ch);
	    echo 'result:'.$result;    // 這裡只是讓您知道訊息發送結果是否成功
	}

	public function sendPushToIos()
	{
		
		//$tokens = tokenBuy::where('device', '=', 2)->take(1)->get();
		$tokens = tokenFish::where('device', '=', 2)->take(1)->get();
		foreach($tokens as $t){
			$deviceToken = $t->device_token;
		}
		
		// Put your private key's passphrase here:
		//$passphrase = 'kuobuyios';
		$passphrase = 'passphrase';

		// Put your alert message here:
		$message = 'xxx';


		$ctx = stream_context_create();
		//stream_context_set_option($ctx, 'ssl', 'local_cert', dirname(__FILE__).'/'.'devck.pem');
		stream_context_set_option($ctx, 'ssl', 'local_cert', dirname(__FILE__).'/'.'prodck.pem');
		stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);

		// Open a connection to the APNS server
		
		//this is for development
		//$ssl_connect = 'ssl://gateway.sandbox.push.apple.com:2195';
		
		//this is for production
		$ssl_connect = 'ssl://gateway.push.apple.com:2195';

		
		$fp = stream_socket_client(
			$ssl_connect, $err,
			$errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx
		);

		if (!$fp)
			exit("Failed to connect: $err $errstr" . PHP_EOL);

		echo 'Connected to APNS' . PHP_EOL;

		// Create the payload body
		$body['aps'] = array(
			"badge"=>"0",
			'alert' => $message,
			'sound' => 'default',
			'url' => 'xxx'
		);
	
		// Encode the payload as JSON
		$payload = json_encode($body);
	//	echo $payload; die;
		// Build the binary notification
		$msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;

		// Send it to the server
		$result = fwrite($fp, $msg, strlen($msg));

		if (!$result)
			echo 'Message not delivered' . PHP_EOL;
		else
			echo 'Message successfully delivered' . PHP_EOL;

		// Close the connection to the server
		fclose($fp);
		 									
		return;	
	
	
	}	


}
