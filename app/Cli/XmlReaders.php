<?php

namespace app\Cli;

use XMLReader;

class XmlReaders extends AbstractCommand
{

    public function reader(...$arg):void
    {
        $node = $arg[0] ?? 'modification';
        $nameAttribute = $arg[1] ?? 'name';

        $reader = new XMLReader();

        $reader->open($this->params);

        while ($reader->read()) {
            if ($reader->localName == $node) {

                $this->storage[] = $reader->getAttribute($nameAttribute);
            }
        }

    }

}