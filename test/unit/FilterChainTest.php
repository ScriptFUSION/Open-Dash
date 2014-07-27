<?php
use ScriptFUSION\OpenDash\Filter\FilterBase;
use ScriptFUSION\OpenDash\Filter\FilterChain;

class FilterChainTest extends PHPUnit_Framework_TestCase {
    public function testFilterChain() {
        $chain = (new FilterChain)->addFilters([
            Mockery::mock(FilterBase::class)->shouldReceive(['__invoke' => 'foo'])->getMock(),
            Mockery::mock(FilterBase::class)->shouldReceive(['__invoke' => 'bar'])->getMock()
        ]);

        $this->assertSame('bar', $chain->filter(null));
    }
}
