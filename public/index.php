<?php
ini_set('opcache.enable', false);
ini_set('opcache.revalidate_freq', 0);
include_once "../src/helpers.php";
include_once "../autoloader.php";


$app = new Application();
$app->run();