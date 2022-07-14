<?php

/**
 * 
 * Import the HMAC Signer class
 */
require_once('hmac-signer.php');

class handleRequest {

    public function __construct($key, $secret) {
        $this->key = $key;
        $this->secret = $secret;
    }

    /**
     * 
     * signRequestAndSend
     * Generate the auth header and make the API request
     * @param String $body
     * @param String $method -> GET, POST, PUT etc. Must be capitalised
     * @param String $fullUrl -> full url fro request e.g https://letsknit.admin.staging.blaize.io/v3/users
     * @param String $path -> API endpoint path e.g /v3/users
     * @param String $query -> query params. DO NOT include the '?'
     * @return Array $response -> CuRL response
     * 
     */
    public function signRequestAndSend ($body, $method, $fullUrl, $path, $query) {

        $timestamp = strval(round(microtime(true)*1000));
        $nonce = uniqid();

        if ($method == 'GET') {
            $body = '';
        } else {
            $body = $body;
        }

        try {
            $signer = new HmacSigner("SHA256");
            $header = "ZEPHR-HMAC-SHA256 " . $this->key . ":" . $timestamp . ":" . $nonce . ":" . $signer->signRequest($this->secret, $body, $path, $query, $method, $timestamp, $nonce);
        } catch (Exception $e) {
            print($e->Message() . "\n");
            exit;
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $fullUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => $method,
        CURLOPT_HTTPHEADER => array(
            "Authorization: " . $header
        ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return $response;

    }
}