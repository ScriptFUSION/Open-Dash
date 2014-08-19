<?php
use ScriptFUSION\OpenDash\Convert\ConversionChain;
use ScriptFUSION\OpenDash\Convert\ConversionChainBuilder;
use ScriptFUSION\OpenDash\Convert\ConverterFactory;
use ScriptFUSION\OpenDash\Convert\Cut;
use ScriptFUSION\OpenDash\Convert\Trim;

class ConversionChainBuilderTest extends PHPUnit_Framework_TestCase {
    public function test() {
        $builder = new ConversionChainBuilder(new ConverterFactory);

        $chain = $builder->build('cut 1|trim');

        $this->assertInstanceOf(ConversionChain::class, $chain);
        $this->assertInstanceOf(Cut::class, $chain[0]);
        $this->assertInstanceOf(Trim::class, $chain[1]);
    }
}
