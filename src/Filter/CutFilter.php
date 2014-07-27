<?php
namespace ScriptFUSION\OpenDash\Filter;

class CutFilter extends FilterLines {
    private
        $fields,
        $delimiter
    ;

    public function __construct($fields, $delimiter = "\t") {
        $this->fields = $fields;
        $this->delimiter = $delimiter;
    }

    public function filterLine($line, $lineNumber) {
        return explode($this->delimiter, $line)[$this->fields - 1];
    }
}
