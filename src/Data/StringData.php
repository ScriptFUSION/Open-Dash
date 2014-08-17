<?php
namespace ScriptFUSION\OpenDash\Data;

class StringData implements Data {
    private
        $data,
        $error
    ;

    public function __construct($data, $error = '') {
        $this->data = $data;
        $this->error = $error;
    }

    public function getData() {
        return "$this";
    }

    public function getError() {
        return $this->error;
    }

    public function isValid() {
        return !isset($this->error[0]);
    }

    public function jsonSerialize() {
        return "$this";
    }

    public function __toString() {
        return "{$this->data}";
    }
}
