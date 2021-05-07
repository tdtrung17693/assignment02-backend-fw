<?php

function config($configKey, $defaultValue = null)
{
    $config = require './config/app.php';

    return array_key_exists($configKey, $config) ? $config[$configKey] : $defaultValue;
}