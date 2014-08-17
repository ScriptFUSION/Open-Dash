<?php
namespace ScriptFUSION\OpenDash\DataProvider;

use ScriptFUSION\OpenDash\Data\Data;

/**
 * Defines a mechanism for providing data.
 */
interface DataProvider {
    /**
     * @return Data
     */
    public function provideData();
}
