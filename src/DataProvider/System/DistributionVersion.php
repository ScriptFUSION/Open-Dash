<?php
namespace ScriptFUSION\OpenDash\DataProvider\System;

use ScriptFUSION\OpenDash\Convert\Lines;
use ScriptFUSION\OpenDash\Convert\Trim;

class DistributionVersion extends SystemDataProvider {
    public function __construct() {
        $this->command = 'lsb_release -a';

        $this->getConversionChain()->addConverters([
            new Lines,
            function(\Traversable $lines) {
                foreach ($lines as $line) {
                    list($key, $value) = explode(':', $line, 2);
                    yield $key => $value;
                }
            },
            new Trim
        ]);
    }
}
