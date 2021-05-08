<?php

function config($configKey, $defaultValue = null)
{
    $config = require __DIR__ . "/config/app.php";
    return array_key_exists($configKey, $config) ? $config[$configKey] : $defaultValue;
}

function env($envName)
{

}