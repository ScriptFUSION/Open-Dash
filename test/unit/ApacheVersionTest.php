<?php
use ScriptFUSION\OpenDash\DataProvider\System\ApacheVersion;

class ApacheVersionTest extends PHPUnit_Framework_TestCase {
    public function testFilters() {
        $apacheVersion = new ApacheVersion;

        $this->assertSame('Apache/1.2.34 (Ubuntu)', $apacheVersion->getFilterChain()->filter(
            "Server version: Apache/1.2.34 (Ubuntu)\nServer built:   Jan 01 1970 00:00:00\n"
        ));
    }
}
