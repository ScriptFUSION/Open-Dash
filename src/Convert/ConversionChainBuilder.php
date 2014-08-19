<?php
namespace ScriptFUSION\OpenDash\Convert;

use ScriptFUSION\OpenDash\Command\Command;
use ScriptFUSION\OpenDash\Command\CommandParser;

/**
 * Builds a ConversionChain from a string specification.
 */
class ConversionChainBuilder {
    private
        $factory,
        $parser
    ;

    public function __construct(ConverterFactory $factory) {
        $this->parser = new CommandParser;
        $this->factory = $factory;
    }

    /**
     * Builds a ConversionChain from the specified specification.
     *
     * @param string $specification <converter> [arg1 [arg2 ...]][ | <converter>]...
     * @return ConversionChain New ConversionChain.
     */
    public function build($specification) {
        $commands = $this->parser->parseCommands($specification);

        $chain = new ConversionChain;

        /** @var Command $command */
        foreach ($commands as $command)
            $chain->addConverter($this->factory->createConverter("$command", $command->renderArguments()));

        return $chain;
    }
}
