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

    public function getMethod($method){
        $this->method = $method;
    }

    public function getUri($uri){
        $this->uri = $uri;
    }

    public function getOptions($options){
        $this->options = $options;
    }

    public function response() {
        $res = $this->request($this->method, $this->uri, $this->options);

        $body = $res->getBody();
        $content = json_decode($body->getContents());

        return $content;
    }
}
