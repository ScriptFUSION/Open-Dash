<?php
namespace ScriptFUSION\OpenDash\DataProvider;

use ScriptFUSION\OpenDash\Filter\TrimFilterChainTrait;

/**
 * Provides data.
 */
abstract class DataProvider {
    use TrimFilterChainTrait;

    /**
     * @return Data
     */
    abstract public function provideData();

    /**
     * @return string Data.
     */
    public function __toString() {
        return "{$this->provideData()}";
    }
}
