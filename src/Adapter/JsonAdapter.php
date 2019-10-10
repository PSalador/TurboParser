<?php

namespace App\Adapter;

use App\Model\Parser;

class JsonAdapter
{
    /**
     * @param string $jsonData
     *
     * @return Parser|null
     */
    public function create(string $jsonData)
    {
        $data = json_decode($jsonData, true);
        if (!$data) {
            return null;
        }
        $text = $data['job']['text'] ?? null;
        $methods = $data['job']['methods'] ?? null;
        if (!$text || !is_array($methods)) {
            return null;
        }
        foreach ($methods as $method) {
            if (!is_string($method)) {
                return null;
            }
        }

        return (new Parser())->setText($text)->setMethods($methods);
    }
}