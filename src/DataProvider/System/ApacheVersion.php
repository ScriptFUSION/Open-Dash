<?php
namespace ScriptFUSION\OpenDash\DataProvider\System;

use ScriptFUSION\OpenDash\Convert\Cut;
use ScriptFUSION\OpenDash\Convert\Line;
use ScriptFUSION\OpenDash\Convert\Trim;

class ApacheVersion extends SystemDataProvider {
    public function __construct() {
        $this->command = 'apachectl -v';

        $this->getConversionChain()->addConverters([
            new Line,
            new Cut(2, ':'),
            new Trim,
        ]);
    }
}
