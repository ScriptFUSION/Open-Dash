<?php
namespace ScriptFUSION\OpenDash\Filter;

interface Filter {
    /**
     * @param string $data
     * @return string
     */
    public function filter($data);
}
