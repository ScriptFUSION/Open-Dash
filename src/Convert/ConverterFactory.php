<?php
namespace ScriptFUSION\OpenDash\Convert;

use ScriptFUSION\OpenDash\Structure\ImplementationFinderFactory;

/**
 * Creates concrete instances of Convert.
 */
class ConverterFactory {
    use ImplementationFinderFactory;

    /**
     * Initializes ConverterFactory.
     */
    public function __construct() {
        $this->findImplementations(Convert::class);
    }

    /**
     * Creates a converter matching the specified name constructed with the
     * specified arguments.
     *
     * @param string $name Converter name.
     * @param array $arguments Converter arguments.
     * @return Convert New Convert instance.
     */
    public function createConverter($name, array $arguments = []) {
        return $this->createImplementation($name, $arguments);
    }

    /**
     * Gets a list of available converters.
     *
     * @return array Lower-case converter name => fully qualified class name.
     */
    public function getConverters() {
        return $this->implementations;
    }
}
