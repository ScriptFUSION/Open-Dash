<?php
use ScriptFUSION\OpenDash\DataProvider\System\KernelVersion;

class KernelVersionTest extends PHPUnit_Framework_TestCase {
    public function testExecute() {
        $this->assertNotEmpty((string)new KernelVersion);
    }
}
