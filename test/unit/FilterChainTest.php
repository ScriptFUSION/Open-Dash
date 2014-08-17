<?php
use ScriptFUSION\OpenDash\Convert\ConversionChain;

class FilterChainTest extends PHPUnit_Framework_TestCase {
    public function testFilterChain() {
        $chain = (new ConversionChain)->addConverters([
            function() { return 'foo'; },
            function($data) { return "${data}bar"; }
        ]);

        $this->assertSame('foobar', $chain->convert(null));
    }
}
