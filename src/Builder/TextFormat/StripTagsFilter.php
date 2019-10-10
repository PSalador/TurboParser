<?php

namespace App\Builder\TextFormat;

class StripTagsFilter extends TextFormat
{
    public $name = 'stripTags';

    public function formatText(string $text): string
    {
        return strip_tags($text);
    }
}