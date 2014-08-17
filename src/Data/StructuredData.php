<?php
namespace ScriptFUSION\OpenDash\Data;

class StructuredData extends \ArrayObject implements Data {
    private $error;

    /**
     * @param array|object|\Traversable $collection
     * @param string $error
     */
    public function __construct($collection, $error = '') {
        $collection instanceof \Traversable && $collection = iterator_to_array($collection);
        !is_array($collection) && $collection = [$collection];

        parent::__construct($collection);
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
