<?php
namespace ScriptFUSION\OpenDash\Filter;

class TrimFilter extends FilterBase {
    /**
     * @param string $data
     * @return string
     */
    public function filter($data) {
        return trim($data);
    }
}
