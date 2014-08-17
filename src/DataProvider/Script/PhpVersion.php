<?php
namespace ScriptFUSION\OpenDash\DataProvider\Script;

use ScriptFUSION\OpenDash\Data\StringData;

class PhpVersion extends ScriptDataProvider {
    public function run() {
        return new StringData(PHP_VERSION);
    }
}
