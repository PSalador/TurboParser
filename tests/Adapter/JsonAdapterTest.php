<?php

namespace App\Tests\Adapter;

use App\Model\Parser;
use App\Adapter\JsonAdapter;
use PHPUnit\Framework\TestCase;

class JsonAdapterTest extends TestCase
{
    public function testJsonAdapterCreatedSuccess()
    {
        $data = (new JsonAdapter())->create('
            {
                "job": {
                    "text": "Привет",
                    "methods": [
                        "removeSpaces", "replaceSpacesToEol", "htmlspecialchars"
                    ]
                }
            }
        ');
        $this->assertNotNull($data);
        $this->assertInstanceOf(Parser::class, $data);
        $this->assertEquals('Привет', $data->getText());
        $this->assertEquals('replaceSpacesToEol', $data->getMethods()[1]);
        $this->assertCount(3, $data->getMethods());
    }

    public function testJsonAdapterCreatedFail()
    {
        $data = (new JsonAdapter())->create('{}');
        $this->assertNull($data);
    }
}