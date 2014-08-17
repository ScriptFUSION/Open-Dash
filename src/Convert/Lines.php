<?php
namespace ScriptFUSION\OpenDash\Convert;

/**
 * Converts a string containing line breaks into a collection of lines.
 */
class Lines implements Convert {
    use Converter;

    /**
     * @param string $data
     * @return \Generator Lines.
     */
    public function convert($data) {
        for (
            $token = strtok($data, PHP_EOL);
            $token !== false;
            $token = strtok(PHP_EOL)
        )
            yield $token;
    }
}
