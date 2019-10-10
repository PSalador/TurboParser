<?php

namespace App\Tests\Builder\TextFormat;

use App\Builder\TextFormat\ReplaceSpacesToEolFilter;
use PHPUnit\Framework\TestCase;

class ReplaceSpacesToEolFilterTest extends TestCase
{
    public function testName()
    {
        $this->assertEquals('replaceSpacesToEol', (new ReplaceSpacesToEolFilter())->name);
    }

    public function testFormatText()
    {
        $this->assertEquals("test1\ntest2\n\n\n\n\ntest3", (new ReplaceSpacesToEolFilter())->formatText("test1 test2     test3"));
    }
}