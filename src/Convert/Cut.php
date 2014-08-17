<?php
namespace ScriptFUSION\OpenDash\Convert;

class Cut implements Convert {
    use DualConverter;

    private
        $fields,
        $delimiter
    ;

    public function __construct($fields, $delimiter = "\t") {
        $this->fields = $fields;
        $this->delimiter = $delimiter;
    }

    /**
     * @param string $string
     * @return string
     */
    public function convertString($string) {
        return explode($this->delimiter, $string)[$this->fields - 1];
    }
}
