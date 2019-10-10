<?php

namespace App\Tests\Builder\TextFormat;

use App\Builder\TextFormat\TextFormat;
use PHPUnit\Framework\TestCase;

class TextFormatTest extends TestCase
{

    public function testName()
    {
        $this->assertEquals('text', (new TextFormat())->name);
    }

    public function testFormatText()
    {
        $this->assertEquals("<a href='test'>Test!.</a>", (new TextFormat())->formatText("<a href='test'>Test!.</a>"));
    }
}