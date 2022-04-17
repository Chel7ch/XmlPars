<?php

use Services\Stat;

try {
    spl_autoload_register(function (string $className) {
        require_once dirname(__DIR__) . '/' . str_replace('\\', '/', $className) . '.php';
    });

    Stat::start();

    list(, $className, $fileName ) = $argv;

    // namespace
    $className = '\\app\\Cli\\' . $className;

    if (!class_exists($className)) {
        throw new Exceptions\CliException('Class "' . $className . '" not found ');
    }

    if (!file_exists($fileName)) {
        throw new Exceptions\CliException('Not found  path to file ');
    }
    $class = new $className($fileName);
    $class->reader(...array_slice($argv,3));
    $class->output();

    Stat::end();

} catch (\Exceptions\CliException $e) {
    echo 'Error: ' . $e->getMessage();
}