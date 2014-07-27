<?php
namespace ScriptFUSION\OpenDash\DataProvider\Script;

use ScriptFUSION\OpenDash\DataProvider\Data;
use ScriptFUSION\OpenDash\DataProvider\DataProvider;

abstract class ScriptDataProvider extends DataProvider {
    public function provideData() {
        return $this->run();
    }

    /**
     * @return Data
     */
    abstract function run();
}
