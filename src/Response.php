<?php

class Response {
    protected array $headers = [];
    protected $contentType = "text/plain";
    protected $content = "";
    protected $statusCode = 200;

    public function setContent($content) {
        $this->content = $content;
        return $this;
    }

    public function setHeader($headerName, $headerValue) {
        $this->headers[$headerName] = $headerValue;
        return $this;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function redirect($uri) {
        $this->statusCode = 302;
        $this->setHeader('location', $uri);

        return $this;
    }

    public function sendResponse() {
        foreach ($this->headers as $headerName => $headerValue) {
            echo $headerName;
            header("$headerName: $headerValue");
        }

        http_response_code($this->statusCode);

        echo $this->content;
        return $this;
    }
}