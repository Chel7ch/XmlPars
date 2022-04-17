<?php

namespace app\Cli;

use Exceptions\CliException;

abstract class AbstractCommand
{
    protected $params;
    protected $storage;

    public function __construct(string $params)
    {
        $this->params = $params;
    }

    abstract public function reader():void;

    public function output(): void
    {
        echo "\e[1m Результат: \e[0m", PHP_EOL;
        echo $this->cleanUp(), PHP_EOL;
    }

    private function cleanUp(): int
    {
        return count(array_filter(array_unique($this->storage)));
    }

}