<?php
use ScriptFUSION\OpenDash\Model\ModelFactory;
use ScriptFUSION\OpenDash\Model\Version;

class ModelFactoryTest extends PHPUnit_Framework_TestCase {
    public function testCreateVersionModel() {
        $this->assertInstanceOf(Version::class, (new ModelFactory)->createModel('version'));
    }
}
