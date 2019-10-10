<?php

namespace App\Tests\Builder\TextFormat;

use App\Builder\TextFormat\HtmlSpecialCharsFilter;
use PHPUnit\Framework\TestCase;

class HtmlSpecialCharsFilterTest extends TestCase
{
    public function testName()
    {
        $this->assertEquals('htmlspecialchars', (new HtmlSpecialCharsFilter())->name);
    }

    public function testFormatText()
    {
        $this->assertEquals("&lt;a href='test'&gt;Test&lt;/a&gt;", (new HtmlSpecialCharsFilter())->formatText("<a href='test'>Test</a>"));
    }
}