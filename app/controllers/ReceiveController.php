<?php

class ReceiveController extends BaseController {
	
	public function getMcpro($from,$ts,$msg,$from_ip)
	{
		
		$aMsg = explode(' ', $msg);
		$rKey = array_shift($aMsg);
		$rKey = strtoupper($rKey);
		$msg = implode(' ', $aMsg);

		$acc = Account::all();
		$checker = 0;
		
		foreach ($acc as $ac) {
			if( $ac->keyword == $rKey) {
				if($ac->active == 1) {
						$checker = 1;
				
						$datatopost = [
							"from" => $from,
							"ts" => $ts,
							"msg" => $msg
						];
				
						$ch = curl_init ($ac->url);
						curl_setopt ($ch, CURLOPT_POST, true);
						curl_setopt ($ch, CURLOPT_POSTFIELDS, $datatopost);
						curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
						curl_exec ($ch);
				} else {
					$checker = 1;
					$msg = "$rKey $msg";
					Unknown::insert([
						   	'from' => $from,
						   	'message' => $msg,
						   	'datetime' => $ts,
						   	'from_ip' => $from_ip,
						   	'remarks' => 'INACTIVE'
						  ]);
				}
			}	
		}

		if($checker === 0) {
			
			$msg = "$rKey $msg";
			Unknown::insert([
		    		'from' => $from,
		    		'message' => $msg,
		    		'datetime' => $ts,
		    		'from_ip' => $from_ip,
		    		'remarks' => 'UNKNOWN'
		   	]);	
		}

	}

}