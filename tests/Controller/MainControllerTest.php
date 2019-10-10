<?php

namespace App\Tests\Controller;

use App\Model\Parser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class MainControllerTest extends WebTestCase
{

    private function sendRequest($url, $method = 'GET', $data = [])
    {
        $client = static::createClient();
        $headers = ['CONTENT_TYPE' => 'application/json'];
        $client->request($method, $url, [], [], $headers, json_encode($data));
        return $client->getResponse();
    }

    public function testSendEmptyRequest()
    {
        $client = static::createClient();
        $client->request('POST', '/main/parser');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testSendNotValidRequest()
    {
        $response = $this->sendRequest('/main/parser', 'POST', [
            'job' => [
                'text' => 'Simple text',
            ],
        ]);
        $data = json_decode($response->getContent(), true);

        $this->assertEquals("Not valid request", $data['error']);
    }

    public function testSendNoMethodRequest()
    {
        $response = $this->sendRequest('/main/parser', 'POST', [
            'job' => [
                'text' => 'Simple text',
                'methods' => [
                    'simpleMethod'
                ],
            ],
        ]);
        $data = json_decode($response->getContent(), true);

        $this->assertEquals("Simple text", $data['text']);
    }

    public function testSendValidRequest()
    {
        $response = $this->sendRequest('/main/parser', 'POST',[
            'job' => [
                'text' => 'Привет, мне на <a href="test@test.ru">test@test.ru</a> пришло приглашение встретиться, попить кофе с <strong>10%</strong> содержанием молока за <i>$5</i>, пойдем вместе!',
                'methods' => [
                    'stripTags',
                    'removeSpaces',
                    'replaceSpacesToEol',
                    'htmlspecialchars',
                    'removeSymbols',
                    'toNumber',
                ],
            ],
        ]);
        $data = json_decode($response->getContent(), true);

        $this->assertEquals("105", $data['text']);
    }
}