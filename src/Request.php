<?php

define('METHOD_NAME', '_method');

class Request
{
    protected $method;
    protected $baseUrl;
    protected $requestUri;
    protected $body = [];
    protected $files = [];
    protected $queries = [];
    protected $headers = [];
    protected $cookies = [];
    protected $allowedMethods = ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'OPTIONS'];

    function __construct()
    {
        $this->init();
    }

    function dump()
    {
        echo "<pre>";
        var_dump($this); 
        echo "</pre>";
    }

    function input($inputName, $defaultValue = null) {
        if (array_key_exists($inputName, $this->body)) return $this->body[$inputName];
        if (array_key_exists($inputName, $this->queries)) return $this->queries[$inputName];

        return $defaultValue;
    }

    function file($inputName): UploadedFile {
        return array_key_exists($inputName, $this->files) ? $this->files[$inputName] : UploadedFile::emptyFile();
    }

    function header($headerName) {
        return array_key_exists($headerName, $this->headers) ? $this->headers[$headerName] : null;
    }

    function hasInput($inputName) {
        return array_key_exists($inputName, $this->body) || array_key_exists($inputName, $this->queries);
    }

    function getRequestUri() {
        return $this->requestUri;
    }

    function getRequestMethod() {
        return $this->method;
    }

    function getBaseUrl() {
        return $this->baseUrl;
    }

    protected function init()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method == 'POST' && array_key_exists(METHOD_NAME, $_POST) && in_array($_POST[METHOD_NAME], $this->allowedMethods)) {
            $method = $_POST[METHOD_NAME];
        }
        $this->method = strtolower($method);

        $this->baseUrl = $_SERVER['SERVER_NAME'];
        $this->requestUri = explode('?', $_SERVER['REQUEST_URI'])[0];

        $this->populateHeaders();
        $this->populateFiles();
        $this->populateBody();
        $this->populateQueries();
    }

    protected function populateHeaders()
    {
        $keys = array_keys($_SERVER);
        $headerKeys = array_filter($keys, function ($key) {
            return substr($key, 0, 5) == 'HTTP_';
        });

        foreach ($headerKeys as $headerKey) {
            $headerName = $this->transformNativeHeaderName(
                str_replace('HTTP_', '', $headerKey)
            );

            if ($headerName === 'cookie') $this->populateCookies($_SERVER[$headerKey]);
            else $this->headers[strtolower($headerName)] = $_SERVER[$headerKey];
        }
    }

    protected function transformNativeHeaderName($headerKey)
    {
        return strtr($headerKey, "_ABCDEFGHIJKLMNOPQRSTUVXYZW", "-abcdefghijklmnopqrstuvxyzw");
    }

    protected function populateFiles()
    {
        if (!(isset($_FILES) && count($_FILES) > 0)) return;

        foreach ($_FILES as $inputName => $fileInfo) {
            $this->files[$inputName] = new UploadedFile($fileInfo['tmp_name'], $fileInfo['name'], $fileInfo['type']);
        }
    }

    protected function populateBody()
    {
        if (!(isset($_POST) && count($_POST) > 0)) return;

        foreach ($_POST as $inputName => $inputValue) {
            $this->body[$inputName] = $inputValue;
        }
    }

    protected function populateQueries()
    {
        if (!(isset($_GET) && count($_GET) > 0)) return;
        foreach ($_GET as $inputName => $inputValue) {
            $this->queries[$inputName] = $inputValue;
        }
    }

    protected function populateCookies($rawValue)
    {
        $cookies = explode("; ", $rawValue);
        foreach ($cookies as $cookie) {
            list($name, $value) = explode("=", $cookie);
            $this->cookies[$name] = $value;
        }
    }
}
