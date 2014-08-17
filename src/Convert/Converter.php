<?php
namespace ScriptFUSION\OpenDash\Convert;

/**
 * Converts string data to an implementation-defined format.
 */
trait Converter {
    /**
     * @param mixed $data
     * @return mixed
     */
    abstract public function convert($data);

    /**
     * @param mixed $arg
     * @return mixed
     */
    public function __invoke($arg) {
        return $this->convert($arg);
    }
}
