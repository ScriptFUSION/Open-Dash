<?php
namespace ScriptFUSION\OpenDash\Convert;

class Trim implements Convert {
    use DualConverter;

    /**
     * @param string $string
     * @return string
     */
    public function convertString($string) {
        return trim($string);
    }
}
