<?php
namespace ScriptFUSION\OpenDash\Convert;

class KeyValuePair implements Convert {
    use DualConverter { convert as convertDataOrCollection; }

    /**
     * @param mixed $data
     * @return mixed
     */
    public function convert($data) {
        if (is_array($data) && count($data) === 2)
            return $this->convertData($data);

        return $this->convertDataOrCollection($data);
    }

    /**
     * Converts the specified tuple to a key and value array using the first
     * value as the key and the second value as the value.
     *
     * @param array $tuple [key, value]
     * @return array [key => value]
     */
    public function convertData($tuple) {
        return [$tuple[0] => $tuple[1]];
    }
}
