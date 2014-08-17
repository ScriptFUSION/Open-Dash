<?php
namespace ScriptFUSION\OpenDash\DataProvider;

/**
 * Defines a mechanism for providing data.
 */
interface DataProvider {
    /**
     * @return Data
     */
    public function provideData();
}
