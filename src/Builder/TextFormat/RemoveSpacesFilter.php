<?php

namespace App\Builder\TextFormat;


class RemoveSpacesFilter extends TextFormat
{
    public $name = 'removeSpaces';

    public function formatText(string $text): string
    {
        return str_replace(' ', '', $text);
    }
}