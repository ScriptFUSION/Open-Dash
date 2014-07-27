<?php
namespace ScriptFUSION\OpenDash\Filter;

trait TrimFilterChainTrait {
    private $filterChain;

    public function getFilterChain() {
        return $this->filterChain ?: $this->filterChain = new TrimFilterChain;
    }
}
