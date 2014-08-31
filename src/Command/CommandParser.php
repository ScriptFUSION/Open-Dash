<?php
namespace ScriptFUSION\OpenDash\Command;

/**
 * Parses a string command specification into a tree of Command and Argument objects.
 */
class CommandParser {
    const
        PARSE_COMMANDS = '
            #Command name.
            (?<command>[a-z][a-z\d]*+)

            #Optional arguments list.
            (?<args>(?:%s)*)

            #Optional whitespace followed by pipe or end of expression.
            \s*+(?:\||\z)
        ',

        PARSE_ARGUMENTS = '
            #Each argument must proceed whitespace.
            \s++
            (?J:
                #Single or double quoted form.
                (?<quote>[\'"])
                    #Only even quantities of backslahes may end the argument.
                    (?<arg>.*?(?<!\\\\)(?:\\\\\\\\)*+)
                #Closing quote must match opening quote.
                \k<quote>
                |
                #Unquoted form. Argument may not contain whitespace or pipes.
                (?<arg>[^\s|]++)
            )
        ',

        REGEX_SHELL = '[%s]xS'
    ;

    /**
     * Parses the specified command line into a list of Commands.
     *
     * @param string $commandLine Command line.
     * @return Command[] Command list.
     */
    public function parseCommands($commandLine) {
        $matches = [];
        if (false === preg_match_all(
            sprintf(static::REGEX_SHELL, sprintf(static::PARSE_COMMANDS, static::PARSE_ARGUMENTS)),
            $commandLine, $matches
        ))
            throw new ParseException("Unable to parse command line: $commandLine");

        $commands = [];
        foreach ($matches['command'] as $index => $command)
            $commands[$index] = new Command($command, $this->parseArguments($matches['args'][$index]));

        return $commands;
    }

    /**
     * Parses the specified arguments into a list of Arguments.
     *
     * Note: arguments have to be parsed in a separate pass since PCRE does not
     * support capturing multiple matches from quantified groups (see
     * <http://www.rexegg.com/regex-capture.html#groupnumbers>).
     *
     * @param string $args Arguments.
     * @return Argument[] Arguments list.
     */
    private function parseArguments($args) {
        $matches = [];
        if (false === preg_match_all(
            sprintf(static::REGEX_SHELL, static::PARSE_ARGUMENTS), $args, $matches, PREG_SET_ORDER
        ))
            throw new ParseException("Unable to parse arguments: $args");

        $args = [];
        foreach ($matches as $index => $arg)
            $args[$index] = new Argument($arg['arg'], $arg['quote']);

        return $args;
    }
}
