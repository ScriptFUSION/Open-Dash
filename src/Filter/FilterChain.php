<?php
namespace ScriptFUSION\OpenDash\Filter;

class FilterChain extends \SplDoublyLinkedList implements Filter {
    /**
     * @param string $data
     * @return string
     */
    public function filter($data) {
        return (string)\iter\reduce(
            function ($data, callable $filter) {
                return $filter($data);
            },
            $this->getIterator(), $data
        );
    }

    /**
     * @return \Iterator
     */
    protected function getIterator() {
        return $this;
    }

    public function addFilters(array $filters) {
        foreach ($filters as $filter)
            $this->push($filter);

        return $this;
    }
}
