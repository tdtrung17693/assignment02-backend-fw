<?php

function config($configKey, $defaultValue = null)
{
    $config = require __DIR__ . "/config/app.php";
    return array_key_exists($configKey, $config) ? $config[$configKey] : $defaultValue;
}

function pathJoin()
{
    $args = func_get_args();
    $paths = array();
    foreach ($args as $arg) {
        $paths = array_merge($paths, (array)$arg);
    }

    $paths = array_map(create_function('$p', 'return trim($p, "/");'), $paths);
    $paths = array_filter($paths);
    return join('/', $paths);
}

function app() : Application {
    return Application::getInstance();
}

function env($envName)
{

}

/**
 * > 1 2 3 4 5 ... n
 * 1 2 3 >4 5 ... n
 * 1 ... 3 4 >5 6 7... n
 * 1 ... n-4 >n-3 n-2 n-1 n
 *
 * @param $pageNumber
 * @param $pageSize
 * @param $pageTotal
 * @param $totalPages
 */
function pagination($pageNumber, $totalPages) {
    if ($totalPages == 1) return [1];
    $pageList = [];

    if ($pageNumber >= 1) {
        array_push($pageList, 1);
    }

    if ($pageNumber - 3 > 1 && $pageNumber + 3 < $totalPages) {
        array_push($pageList, '...');

        for ($p = $pageNumber - 2; $p < $pageNumber + 3 && $p < $totalPages; ++$p) {
            array_push($pageList, $p);
        }

        array_push($pageList, '...');
    } else if ($pageNumber - 3 <= 1 && $pageNumber + 3 < $totalPages) {
        for ($p = 2; $p < 6 && $p < $totalPages; ++$p) {
            array_push($pageList, $p);
        }

        array_push($pageList, '...');
    } else if ($pageNumber - 3 > 1 && $pageNumber + 3 >= $totalPages) {
        array_push($pageList, '...');

        for ($p = $totalPages - 4; $p < $totalPages; ++$p) {
            array_push($pageList, $p);
        }
    } else {
        for ($p = 2; $p < $totalPages; ++$p) {
            array_push($pageList, $p);
        }
    }

    array_push($pageList, $totalPages);

    return $pageList;
}