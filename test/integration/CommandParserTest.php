<?php
use ScriptFUSION\OpenDash\Command\CommandParser;

class CommandParserTest extends PHPUnit_Framework_TestCase {

    /** @var CommandParser */
    private $parser;

    protected function setUp() {
        $this->parser = new CommandParser;
    }

    public function testParseNothing() {
        $commands = $this->parser->parseCommands('');

        $this->assertCount(0, $commands);
    }

    public function testParseOneCommand() {
        $commands = $this->parser->parseCommands('foo');

        $this->assertCount(1, $commands);

        $this->assertSame('foo', $commands[0]->getName());
        $this->assertCount(0, $commands[0]->getArguments());
    }

    public function testParseOneCommandWithOneArgument() {
        $commands = $this->parser->parseCommands('foo bar');

        $this->assertCount(1, $commands);

        $this->assertSame('foo', $commands[0]->getName());
        $this->assertCount(1, $commands[0]->getArguments());
        $this->assertSame('bar', $commands[0]->getArguments()[0]->getValue());
    }

    public function testParseTwoCommands() {
        $commands = $this->parser->parseCommands('foo|bar');

        $this->assertCount(2, $commands);

        $this->assertSame('foo', $commands[0]->getName());
        $this->assertCount(0, $commands[0]->getArguments());

        $this->assertSame('bar', $commands[1]->getName());
        $this->assertCount(0, $commands[1]->getArguments());
    }

    public function testParseTwoCommandsWithArguments() {
        $commands = $this->parser->parseCommands('foo bar | baz qux');

        $this->assertCount(2, $commands);

        $this->assertSame('foo', $commands[0]->getName());
        $this->assertCount(1, $commands[0]->getArguments());
        $this->assertSame('bar', $commands[0]->getArguments()[0]->getValue());

        $this->assertSame('baz', $commands[1]->getName());
        $this->assertCount(1, $commands[1]->getArguments());
        $this->assertSame('qux', $commands[1]->getArguments()[0]->getValue());
    }

    public function testParseRepeatedTokens() {
        $commands = $this->parser->parseCommands('foo foo | foo');

        $this->assertCount(2, $commands);

        $this->assertSame('foo', $commands[0]->getName());
        $this->assertCount(1, $commands[0]->getArguments());
        $this->assertSame('foo', $commands[0]->getArguments()[0]->getValue());

        $this->assertSame('foo', $commands[1]->getName());
        $this->assertCount(0, $commands[1]->getArguments());
    }

    public function testQuotedArguments() {
        $commands = $this->parser->parseCommands('foo "bar" "baz qux" "quux | corge" \'grault "garply"\'" w"a"ldo');

        $this->assertCount(1, $commands);

        $this->assertSame('foo', $commands[0]->getName());
        $this->assertCount(5, $commands[0]->getArguments());

        $this->assertSame('bar', $commands[0]->getArguments()[0]->getValue());
        $this->assertTrue($commands[0]->getArguments()[0]->isQuoted());
        $this->assertSame('"', $commands[0]->getArguments()[0]->getQuote());

        $this->assertSame('baz qux', $commands[0]->getArguments()[1]->getValue());
        $this->assertTrue($commands[0]->getArguments()[1]->isQuoted());
        $this->assertSame('"', $commands[0]->getArguments()[1]->getQuote());

        $this->assertSame('quux | corge', $commands[0]->getArguments()[2]->getValue());
        $this->assertTrue($commands[0]->getArguments()[2]->isQuoted());
        $this->assertSame('"', $commands[0]->getArguments()[2]->getQuote());

        $this->assertSame('grault "garply"', $commands[0]->getArguments()[3]->getValue());
        $this->assertTrue($commands[0]->getArguments()[3]->isQuoted());
        $this->assertSame("'", $commands[0]->getArguments()[3]->getQuote());

        $this->assertSame('w"a"ldo', $commands[0]->getArguments()[4]->getValue());
        $this->assertFalse($commands[0]->getArguments()[4]->isQuoted());
        $this->assertSame('', $commands[0]->getArguments()[4]->getQuote());
    }

    public function testEscapedQuotes() {
        $commands = $this->parser->parseCommands('foo "bar \\"baz" "qux \\\\\\"quux" | corge "grault\\\\" \'garply\'');

        $this->assertCount(2, $commands);

        $this->assertSame('foo', $commands[0]->getName());
        $this->assertCount(2, $commands[0]->getArguments());

        $this->assertSame('bar "baz', $commands[0]->getArguments()[0]->getValue());
        $this->assertTrue($commands[0]->getArguments()[0]->isQuoted());
        $this->assertSame('"', $commands[0]->getArguments()[0]->getQuote());

        $this->assertSame('qux \\"quux', $commands[0]->getArguments()[1]->getValue());
        $this->assertTrue($commands[0]->getArguments()[1]->isQuoted());
        $this->assertSame('"', $commands[0]->getArguments()[1]->getQuote());

        $this->assertSame('corge', $commands[1]->getName());
        $this->assertCount(2, $commands[1]->getArguments());

        $this->assertSame('grault\\', $commands[1]->getArguments()[0]->getValue());
        $this->assertTrue($commands[1]->getArguments()[0]->isQuoted());
        $this->assertSame('"', $commands[1]->getArguments()[0]->getQuote());

        $this->assertSame('garply', $commands[1]->getArguments()[1]->getValue());
        $this->assertTrue($commands[1]->getArguments()[1]->isQuoted());
        $this->assertSame("'", $commands[1]->getArguments()[1]->getQuote());
    }
}
