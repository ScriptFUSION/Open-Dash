<?php
namespace ScriptFUSION\OpenDash\Model;

use ScriptFUSION\OpenDash\Structure\ImplementationFinderFactory;

/**
 * Creates concrete instances of Model.
 */
class ModelFactory {
    use ImplementationFinderFactory;

    public function __construct() {
        $this->findImplementations(Model::class);
    }

    /**
     * Creates a Model matching the specified name.
     *
     * @param string $name Model name.
     * @return Model New Model instance.
     */
    public function createModel($name) {
        return $this->createImplementation($name);
    }

    /**
     * Gets a list of available Models.
     *
     * @return array Lower-case Model name => fully qualified class name.
     */
    public function getModels() {
        return $this->implementations;
    }
}
