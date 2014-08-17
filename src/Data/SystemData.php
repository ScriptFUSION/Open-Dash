<?php
namespace ScriptFUSION\OpenDash\Data;

class SystemData extends StringData {
    private $code;

    public function __construct($data, $error = '', $code = 0) {
        parent::__construct($data, $error);

        $this->code = $code;
    }

    public function getCode() {
        return $this->code;
    }

    public function isValid() {
        return $this->code === 0;
    }
}
