<?php

namespace Services;

class Stat
{
    private static $start;

    private static $memory;

    public static function start()
    {
        self::$start = microtime(true);
        self::$memory = memory_get_usage();
    }

    public static function end()
    {
        printf("%.3f", microtime(true) - self::$start);
        echo ' сек/ '.(int)((memory_get_usage() - self::$memory)/1024) . ' Кб', PHP_EOL;
    }

}