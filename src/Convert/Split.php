<?php
namespace ScriptFUSION\OpenDash\Convert;

class Split implements Convert {
    use DualConverter;

    private
        $delimiter,
        $limit
    ;

    public function __construct($delimiter, $limit = null) {
        $this->delimiter = $delimiter;
        $this->limit = $limit;
    }

    /**
     * @param string $data
     * @return array
     */
    public function convertData($data) {
        return explode($this->delimiter, $data, $this->limit);
    }
}
