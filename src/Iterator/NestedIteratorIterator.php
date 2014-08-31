<?php
namespace ScriptFUSION\OpenDash\Iterator;

/**
 * Describes how to iterate over an Iterator that may contain nested Iterators.
 */
class NestedIteratorIterator implements \RecursiveIterator {
    private $iterator;

    /**
     * Initializes NestedIteratorIterator with the specified Iterator.
     *
     * @param \Iterator $iterator Iterator to iterate over.
     */
    public function __construct(\Iterator $iterator) {
        $this->iterator = $iterator;
    }

    /**
     * Gets the value of the current element.
     *
     * @return mixed Value of the current element.
     */
    public function current() {
        return $this->iterator->current();
    }

    /**
     * Move to the next element.
     *
     * @return void
     */
    public function next() {
        $this->iterator->next();
    }

    /**
     * Gets the key of the current element.
     *
     * @return mixed Scalar on success, otherwise null.
     */
    public function key() {
        return $this->iterator->key();
    }

    /**
     * Checks if current position is valid.
     *
     * @return boolean True if the current position is valid, otherwise false.
     */
    public function valid() {
        return $this->iterator->valid();
    }

    /**
     * Rewind to the first element.
     *
     * @return void
     */
    public function rewind() {
        $this->iterator->rewind();
    }

    /**
     * Gets a value indicating whether an iterator can be created for the current entry.
     *
     * @return bool True if the current entry can be iterated over, otherwise false.
     */
    public function hasChildren() {
        return $this->current() instanceof \Iterator;
    }

    /**
     * Returns an iterator for the current entry.
     *
     * @return \RecursiveIterator An iterator for the current entry.
     */
    public function getChildren() {
        return new static($this->current());
    }
}
