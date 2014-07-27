<?php
namespace ScriptFUSION\OpenDash\DataProvider;

class Data {
    private
        $data,
        $error
    ;

    public function __construct($data, $error = '') {
        $this->data = $data;
        $this->error = $error;
    }

    public function getError() {
        return $this->error;
    }

    public function getData() {
        return $this->data;
    }

    public function isSuccess() {
        return !isset($this->error[0]);
    }

    public function __toString() {
        return "{$this->getData()}";
    }
}