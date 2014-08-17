<?php
use ScriptFUSION\OpenDash\Data\SystemData;
use ScriptFUSION\OpenDash\DataProvider\System\ApacheVersion;

class ApacheVersionTest extends PHPUnit_Framework_TestCase {
    public function testConverters() {
        /** @var ApacheVersion $apacheVersion */
        $apacheVersion = Mockery::mock(ApacheVersion::class, [])->makePartial()->shouldReceive(
            ['execute' => new SystemData(
                "Server version: Apache/1.2.34 (Unix)\nServer built:   Jan 01 1970 00:00:00\n"
            )]
        )->getMock();

        $this->assertSame('Apache/1.2.34 (Unix)', "{$apacheVersion->provideData()}");
    }
}
