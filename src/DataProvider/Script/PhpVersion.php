<?php
namespace ScriptFUSION\OpenDash\DataProvider\Script;

use ScriptFUSION\OpenDash\DataProvider\Data;

class PhpVersion extends ScriptDataProvider {
    public function run() {
        return new Data(PHP_VERSION);
    }
}