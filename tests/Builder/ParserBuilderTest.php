<?php

namespace App\Builder;

use App\Builder\ParserBuilder;
use App\Model\Parser;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ParserBuilderTest extends KernelTestCase
{
    public function testParserBuilderBuild()
    {
        $data = (new Parser)
            ->setText('Привет, мне на <a href="test@test . ru">test@test.ru</a> пришло приглашение встретиться, попить кофе с <strong>10%</strong> содержанием молока за <i>$5</i>, пойдем вместе!')
            ->setMethods(["stripTags", "removeSpaces", "replaceSpacesToEol", "htmlspecialchars", "removeSymbols", "toNumber"]);

        self::bootKernel();
        self::$container->get(ParserBuilder::class)->build($data);

        $this->assertNotNull($data);
        $this->assertInstanceOf(Parser::class, $data);
        $this->assertEquals('105', $data->getText());
    }
}