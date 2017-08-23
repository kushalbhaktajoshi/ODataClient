<?php
namespace KushalBhaktaJoshi\API\Rest;

use GuzzleHttp\Client as GuzzleHttpClient;

class Client extends GuzzleHttpClient
{
    private $method;
    private $uri;
    private $options = [];

    public function __construct() {
        parent::__construct();
    }

    private function getMethod(){
        return $this->method;
    }

    private function getUri(){
        return $this->uri;
    }

    private function getOptions(){
        return $this->options;
    }

    public function setMethod($method){
        $this->method = $method;
    }

    public function setUri($uri){
        $this->uri = $uri;
    }

    public function setOptions($options){
        $this->options = $options;
    }

    public function response() {
        $method = $this->getMethod();
        $uri = $this->getUri();
        $options = $this->getOptions();

        $res = $this->request($method, $uri, $options);

        $body = $res->getBody();
        $content = json_decode($body->getContents());

        return $content;
    }
}
