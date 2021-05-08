<?php
if (extension_loaded('opcache')) opcache_invalidate(__FILE__, true) ;
set_include_path(get_include_path().PATH_SEPARATOR.'/app/src');

spl_autoload_register(function ($className) {
    echo __NAMESPACE__;
    $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    include_once("src/{$classPath}.php");
});