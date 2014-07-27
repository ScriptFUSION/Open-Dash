<?php
namespace ScriptFUSION\OpenDash\DataProvider\System;

use ScriptFUSION\OpenDash\DataProvider\Data;

class SystemData extends Data {
    private $code;

    public function __construct($data, $error = '', $code = 0) {
        parent::__construct($data, $error);

        $this->code = $code;
    }

    public function getCode() {
        return $this->code;
    }

    public function isSuccess() {
        return $this->code === 0;
    }
}