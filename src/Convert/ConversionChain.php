<?php
namespace ScriptFUSION\OpenDash\Convert;

class ConversionChain extends \SplQueue implements Convert {
    use DualConverter;

    /**
     * @param mixed $data
     * @return mixed
     */
    public function convertData($data) {
        return \iter\reduce(
            function ($data, callable $filter) {
                return $filter($data);
            },
            $this, $data
        );
    }

    /**
     * @param callable $converter
     * @return $this
     */
    public function addConverter(callable $converter) {
        $this->push($converter);

        return $this;
    }

    /**
     * @param callable[] $converters
     * @return $this
     */
    public function addConverters(array $converters) {
        foreach ($converters as $converter)
            $this->addConverter($converter);

        return $this;
    }
}
