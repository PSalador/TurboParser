<?php

namespace App\Builder\TextFormat;


class ToNumberFilter extends TextFormat
{
    public $name = 'toNumber';

    public function formatText(string $text): string
    {
        return filter_var($text, FILTER_SANITIZE_NUMBER_INT);
    }
}