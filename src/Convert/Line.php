<?php
namespace ScriptFUSION\OpenDash\Convert;

class Line implements Convert {
    use DualConverter;

    /**
     * @param string $string
     * @return string
     */
    public function convertString($string) {
        return strtok($string, PHP_EOL);
    }
}
