<?php
namespace ScriptFUSION\OpenDash\Model;

use Eloquent\Cosmos\ClassName;
use ScriptFUSION\OpenDash\DataProvider\DataProvider;

abstract class Model implements \IteratorAggregate, \Countable, \JsonSerializable {
    private $dataProviders = [];

    protected function addDataProvider(DataProvider $dataProvider) {
        $this->dataProviders[ClassName::fromString(get_class($dataProvider))->shortName()->string()] = $dataProvider;

        return $this;
    }

    protected function addDataProviders(array $dataProviders) {
        foreach ($dataProviders as $dataProvider)
            $this->addDataProvider($dataProvider);

        return $this;
    }

    public function getIterator() {
        return new \ArrayIterator($this->dataProviders);
    }

    public function count() {
        return count($this->dataProviders);
    }

    public function jsonSerialize() {
        return array_map(
            function (DataProvider $dataProvider) {
                return "$dataProvider";
            },
            $this->dataProviders
        );
    }
}
