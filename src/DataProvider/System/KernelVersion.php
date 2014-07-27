<?php
namespace ScriptFUSION\OpenDash\DataProvider\System;

class KernelVersion extends SystemDataProvider {
    public function __construct() {
        $this->command = 'uname -r';
    }
}
