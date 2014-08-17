<?php
namespace ScriptFUSION\OpenDash\Convert;

/**
 * Augments string data and collections of string data.
 */
trait DualConverter {
    use Converter;

    /**
     * @param mixed $data
     * @return mixed
     */
    public function convert($data) {
        if ($data instanceof \Traversable || is_array($data))
            return $this->convertCollection($data);

        return $this->convertString("$data");
    }

    /**
     * @param string $string
     * @return mixed
     */
    abstract public function convertString($string);

    /**
     * @param \Traversable $items
     * @return \Iterator
     */
    public function convertCollection(\Traversable $items) {
        return \iter\map([$this, 'convertString'], $items);
    }
}
