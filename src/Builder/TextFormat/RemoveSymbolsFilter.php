<?php

namespace App\Builder\TextFormat;


class RemoveSymbolsFilter extends TextFormat
{
    public $name = 'removeSymbols';

    public function formatText(string $text): string
    {
        foreach (str_split('[.,/!@#$%^&*()]') as $symbol) {
            $text = str_replace($symbol, '', $text);
        }
        return $text;
    }
}