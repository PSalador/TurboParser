<?php

namespace App\Tests\Builder\TextFormat;

use App\Builder\TextFormat\RemoveSpacesFilter;
use PHPUnit\Framework\TestCase;

class RemoveSpacesFilterTest extends TestCase
{
    public function testName()
    {
        $this->assertEquals('removeSpaces', (new RemoveSpacesFilter())->name);
    }

    public function testFormatText()
    {
        $this->assertEquals('test1test2test3', (new RemoveSpacesFilter())->formatText("test1 test2     test3"));
    }
}