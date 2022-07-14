<?php

class HmacSigner {

    private $algorithm;

    function __construct($algorithm) {
        if ("SHA256" === $algorithm || "SHA-256" === $algorithm) {
            $this->algorithm = "sha256";
        } else {
            $this->algorithm = algorithm;
        }
    }

    function signRequest($secretKey, $body, $path, $query, $method, $timestamp, $nonce) {

        if (is_null($secretKey)) throw new Exception("Client secret must be provided");
        if (is_null($body)) throw new Exception("Request body must be provided");
        if (is_null($path)) throw new Exception("Request path must be provided");
        if (is_null($method)) throw new Exception("Request method must be provided");
        if (is_null($timestamp)) throw new Exception("Signature timestamp must be provided");
        if (is_null($nonce)) throw new Exception("Signature nonce must be provided");

        return hash($this->algorithm, $secretKey . $body . $path . $query . $method . $timestamp . $nonce);
    }
}