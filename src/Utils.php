<?php

class Utils {
    public static function dump($var) {
        self::preWrap(function () use ($var) {var_dump($var);});
    }

    public static function echo($var) {
        self::preWrap($var);
    }

    protected static function preWrap($value) {
        echo "<pre>";
        is_callable($value) ? $value() : $value;
        echo "</pre>";
    }
}