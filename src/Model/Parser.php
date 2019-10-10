<?php

namespace App\Model;

class Parser
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var array
     */
    private $methods;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     *
     * @return self
     */
    public function setText(string $text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return array
     */
    public function getMethods(): array
    {
        return $this->methods;
    }

    /**
     * @param array $methods
     *
     * @return self
     */
    public function setMethods(array $methods)
    {
        $this->methods = $methods;
        return $this;
    }
}