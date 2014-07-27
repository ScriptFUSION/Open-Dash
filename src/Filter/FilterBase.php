<?php
namespace ScriptFUSION\OpenDash\Filter;

abstract class FilterBase implements Filter {
    public function __invoke($arg) {
        return $this->filter($arg);
    }
}
