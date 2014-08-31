<?php
namespace ScriptFUSION\OpenDash\Convert;

class Trim implements Convert {
    use DualConverter;

    /**
     * @param string $data
     * @return string
     */
    public function convertData($data) {
        return trim("$data");
    }
}
