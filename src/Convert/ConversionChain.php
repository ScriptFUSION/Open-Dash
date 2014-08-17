<?php
namespace ScriptFUSION\OpenDash\Convert;

class ConversionChain extends \SplQueue implements Convert {
    use DualConverter;

    /**
     * @param string $string
     * @return mixed
     */
    public function convertString($string) {
        return \iter\reduce(
            function ($string, callable $filter) {
                return $filter($string);
            },
            $this, "$string"
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
