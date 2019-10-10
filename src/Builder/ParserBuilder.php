<?php

namespace App\Builder;

use App\Model\Parser;

class ParserBuilder
{

    private $filters;

    /**
     * @param iterable $textFilters
     */
    public function __construct(iterable $textFilters)
    {
        foreach ($textFilters as $filter) {
            if ($filter instanceof InputFormat) {
                if (!isset($this->filters[$filter->name])) {
                    $this->filters[$filter->name] = $filter;
                }
            }
        }
    }

    /**
     * @param Parser $parser
     */
    public function build(Parser $parser)
    {
        foreach ($parser->getMethods() as $method) {
            $filter = $this->getFilter($method);
            if ($filter instanceof InputFormat) {
                $parser->setText($filter->formatText($parser->getText()));
            }
        }
    }

    /**
     * @param string $name
     *
     * @return InputFormat|null
     */
    public function getFilter(string $name)
    {
        return $this->filters[$name] ?? null;
    }
}