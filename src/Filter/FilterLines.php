<?php
namespace ScriptFUSION\OpenDash\Filter;

abstract class FilterLines extends FilterBase {
    const TERMINUS = "\n";

    abstract public function filterLine($line, $lineNumber);

    /**
     * @param $data
     * @return \Generator
     */
    protected function createLineIterator($data) {
        for (
            $token = strtok($data, static::TERMINUS), $i = 0;
            $token !== false;
            $token = strtok(static::TERMINUS)
        )
            yield $this->filterLine($token, ++$i);
    }

    /**
     * @param string $data
     * @return string
     */
    public function filter($data) {
        return \iter\reduce(
            function ($accumulator, $line) {
                return "$accumulator$line";
            },
            $this->createLineIterator($data)
        );
    }
}
