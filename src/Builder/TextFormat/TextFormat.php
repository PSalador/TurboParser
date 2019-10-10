<?php

namespace App\Builder\TextFormat;


use App\Builder\InputFormat;

class TextFormat implements InputFormat
{

    public $name = 'text';

    public function formatText(string $text): string
    {
        return $text;
    }
}