<?php
namespace ScriptFUSION\OpenDash\DataProvider\Script;

use ScriptFUSION\OpenDash\DataProvider\DataProvider;

abstract class ScriptDataProvider implements DataProvider {
    public function provideData() {
        return $this->run();
    }

    /**
     * @return string
     */
    abstract function run();
}
