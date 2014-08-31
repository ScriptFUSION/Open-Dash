<?php
namespace ScriptFUSION\OpenDash\Convert;

class Line implements Convert {
    use DualConverter;

    /**
     * @param string $data
     * @return string
     */
    public function convertData($data) {
        return strtok("$data", PHP_EOL);
    }
}
