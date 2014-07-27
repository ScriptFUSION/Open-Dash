<?php
namespace ScriptFUSION\OpenDash\Filter;

class LineFilter extends FilterBase {
    const TERMINUS = "\n";

    /**
     * @param string $data
     * @return string
     */
    public function filter($data) {
        return strtok($data, static::TERMINUS);
    }
}
