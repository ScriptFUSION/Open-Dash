<?php
namespace ScriptFUSION\OpenDash\Filter;

class TrimFilterChain extends FilterChain {
    private $trimFilter;

    public function __construct() {
        $this->trimFilter = new TrimFilter;
    }

    protected function getIterator() {
        foreach ($this as $filter)
            yield $filter;

        yield $this->trimFilter;
    }
}
