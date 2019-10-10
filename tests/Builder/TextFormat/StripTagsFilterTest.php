<?php

namespace App\Tests\Builder\TextFormat;

use App\Builder\TextFormat\StripTagsFilter;
use PHPUnit\Framework\TestCase;

class StripTagsFilterTest extends TestCase
{
    public function testName()
    {
        $this->assertEquals('stripTags', (new StripTagsFilter())->name);
    }

    public function testFormatText()
    {
        $this->assertEquals('Test1  Test3', (new StripTagsFilter())->formatText("<p>Test1</p> <!-- Test2 --> Test3"));
    }
}