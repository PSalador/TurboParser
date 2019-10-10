<?php

namespace App\Builder\TextFormat;


class HtmlSpecialCharsFilter extends TextFormat
{
    public $name = 'htmlspecialchars';

    public function formatText(string $text): string
    {
        return htmlspecialchars($text);
    }
}