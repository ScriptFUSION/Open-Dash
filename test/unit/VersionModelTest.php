<?php
use ScriptFUSION\OpenDash\Model\VersionModel;

class VersionModelTest extends PHPUnit_Framework_TestCase {
    public function testToJson() {
        $this->assertGreaterThan(1, count(get_object_vars(json_decode(json_encode(new VersionModel)))));
    }
}
