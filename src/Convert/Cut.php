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
     * @param string $data
     * @return string
     */
    public function convertData($data) {
        $parts = explode($this->delimiter, "$data");
        $field = $this->fields - 1;

        if (isset($parts[$field]))
            return $parts[$field];

        return '';
    }
}
