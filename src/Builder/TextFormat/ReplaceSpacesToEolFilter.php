<?php

namespace App\Builder\TextFormat;


class ReplaceSpacesToEolFilter extends TextFormat
{
    public $name = 'replaceSpacesToEol';

    public function formatText(string $text): string
    {
        return str_replace(' ', "\n", $text);
    }
}