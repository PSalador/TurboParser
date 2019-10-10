<?php

namespace App\Builder;

interface InputFormat
{
    public function formatText(string $text): string;
}