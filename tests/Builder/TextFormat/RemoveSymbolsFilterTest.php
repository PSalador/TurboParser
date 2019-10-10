<?php

namespace App\Tests\Builder\TextFormat;

use App\Builder\TextFormat\RemoveSymbolsFilter;
use PHPUnit\Framework\TestCase;

class RemoveSymbolsFilterTest extends TestCase
{
    public function testName()
    {
        $this->assertEquals('removeSymbols', (new RemoveSymbolsFilter())->name);
    }

    public function testFormatText()
    {
        $this->assertEquals('q1wertyuio pasdfghj', (new RemoveSymbolsFilter())->formatText("q1w[e.r,t/y!u@i#o$ p%a^s&d*f(g)h]j"));
    }
}