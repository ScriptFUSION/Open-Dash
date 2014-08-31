<?php
namespace ScriptFUSION\OpenDash\DataProvider\System;

use ScriptFUSION\OpenDash\Convert\KeyValuePair;
use ScriptFUSION\OpenDash\Convert\Lines;
use ScriptFUSION\OpenDash\Convert\Split;
use ScriptFUSION\OpenDash\Convert\Trim;

class DistributionVersion extends SystemDataProvider {
    public function __construct() {
        $this->command = 'lsb_release -a';

        $this->getConversionChain()->addConverters([
            new Lines,
            new Split(':', 2),
            new KeyValuePair,
            new Trim,
        ]);
    }
}
