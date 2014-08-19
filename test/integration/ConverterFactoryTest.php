<?php
use ScriptFUSION\OpenDash\Convert\ConverterFactory;
use ScriptFUSION\OpenDash\Convert\Trim;

class ConverterFactoryTest extends PHPUnit_Framework_TestCase {
    public function testCreateTrim() {
        $this->assertInstanceOf(Trim::class, (new ConverterFactory)->createConverter('trim'));
    }
}
