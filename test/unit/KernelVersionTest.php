<?php
use ScriptFUSION\OpenDash\DataProvider\System\KernelVersion;

class KernelVersionTest extends PHPUnit_Framework_TestCase {
    public function testExecute() {
        $data = (new KernelVersion)->provideData();

        $this->assertTrue($data->isValid());
        $this->assertNotEmpty("$data");
    }
}
