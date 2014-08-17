<?php
use ScriptFUSION\OpenDash\DataProvider\System\DistributionVersion;

class DistributionVersionTest extends PHPUnit_Framework_TestCase {
    public function testProvideData() {
        $data = (new DistributionVersion)->provideData();

        $this->assertTrue($data->isValid());
        $this->assertGreaterThan(0, count($data));
        $this->assertArrayHasKey('Distributor ID', $data);
    }
}
