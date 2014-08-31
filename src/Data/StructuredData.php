<?php
namespace ScriptFUSION\OpenDash\Data;

use ScriptFUSION\OpenDash\Iterator\NestedIteratorIterator;

class StructuredData extends \ArrayObject implements Data {
    private $error;

    /**
     * @param array|object|\Iterator $collection
     * @param string $error
     */
    public function __construct($collection, $error = '') {
        // Render nested collections.
        $collection instanceof \Iterator &&
            $collection = iterator_to_array(
                new \RecursiveIteratorIterator(new NestedIteratorIterator($collection))
            );

        // Wrap scalars in array.
        is_scalar($collection) && $collection = [$collection];

        parent::__construct($collection);

        $this->error = $error;
    }

    public function getData() {
        return $this->getArrayCopy();
    }

    public function getError() {
        return $this->error;
    }

    public function isValid() {
        return !isset($this->error[0]);
    }

    public function jsonSerialize() {
        return $this;
    }
}
