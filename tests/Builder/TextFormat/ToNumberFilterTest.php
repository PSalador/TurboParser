<?php

namespace App\Tests\Builder\TextFormat;

use App\Builder\TextFormat\ToNumberFilter;
use PHPUnit\Framework\TestCase;

class ToNumberFilterTest extends TestCase
{
    public function testName()
    {
        $this->assertEquals('toNumber', (new ToNumberFilter())->name);
    }

    public function testFormatText()
    {
        $this->assertEquals('123456', (new ToNumberFilter())->formatText("test 123 test 4 <test> 5 !@# 6 ?^&& "));
    }
}