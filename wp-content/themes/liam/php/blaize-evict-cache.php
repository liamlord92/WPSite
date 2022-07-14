<?php

require_once('../php/config/request-module.php');

$key = "fedad74e-bb23-409d-8e42-48f5ab78ec37";
$secret = "84496eee-5193-4bb4-85b6-57d242cd795c";

$request = new handleRequest($key, $secret);

$body = "/.*";
$method = "POST";
$fullUrl = "https://letsknit.admin.blaize.io/v3/cache-management/evict-origin";
$path = "/v3/cache-management/evict-origin";
$query = "";

$result = $request->signRequestAndSend($body, $method, $fullUrl, $path, $query);
$decode = json_decode($result, true);

if ($decode['message']) {
    $response = json_encode('Cache Cleared');
    echo $response;
}