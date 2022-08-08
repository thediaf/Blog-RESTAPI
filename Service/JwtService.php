<?php
namespace App\Service;

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

class JwtService 
{
    public function __construct()
    {

    }

	public function generate_jwt($headers, $payload, $secret = 'secret') {
		$headers_encoded = base64_encode(json_encode($headers));
		
		$payload_encoded = base64_encode(json_encode($payload));
		
		$signature = hash_hmac('SHA256', "$headers_encoded.$payload_encoded", $secret, true);
		$signature_encoded = base64_encode($signature);
		
		$jwt = "$headers_encoded.$payload_encoded.$signature_encoded";
		
		return $jwt;
	}
}