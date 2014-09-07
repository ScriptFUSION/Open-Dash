<?php
use ScriptFUSION\OpenDash\Model\Version;

class VersionModelTest extends PHPUnit_Framework_TestCase {
    public function testToJson() {
        $this->assertGreaterThan(1, count((array)(json_decode(json_encode(new Version)))));
    }
}
