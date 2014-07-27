<?php
namespace ScriptFUSION\OpenDash\DataProvider\System;

use ScriptFUSION\OpenDash\Filter\CutFilter;
use ScriptFUSION\OpenDash\Filter\LineFilter;

class ApacheVersion extends SystemDataProvider {
    public function __construct() {
        $this->command = 'apachectl -v';

        $this->getFilterChain()->addFilters([
            new LineFilter,
            new CutFilter(2, ':'),
        ]);
    }
}
