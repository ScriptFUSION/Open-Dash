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

        return $this->convertData($data);
    }

    /**
     * @param mixed $data
     * @return mixed
     */
    abstract public function convertData($data);

    /**
     * @param \Traversable|array $items
     * @return \Iterator
     */
    public function convertCollection($items) {
        return \iter\map([$this, 'convert'], $items);
    }
}
