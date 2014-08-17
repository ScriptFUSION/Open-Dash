<?php
use ScriptFUSION\OpenDash\Convert\ConversionChain;

class ConversionChainTest extends PHPUnit_Framework_TestCase {
    public function testConvert() {
        $chain = (new ConversionChain)->addConverters([
            function() { return 'foo'; },
            function($data) { return "${data}bar"; }
        ]);

        $this->assertSame('foobar', $chain->convert(null));
    }
}
