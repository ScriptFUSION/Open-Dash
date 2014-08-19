<?php
namespace ScriptFUSION\OpenDash\Convert;

/**
 * Creates concrete instances of Convert.
 */
class ConverterFactory {
    private $converters;

    /**
     * Initializes ConverterFactory.
     */
    public function __construct() {
        $this->converters = iterator_to_array($this->findConverters());
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
        if (!isset($this->converters[$name]))
            throw new \RuntimeException("Converter not found: $name");

        return (new \ReflectionClass($this->converters[$name]))->newInstanceArgs($arguments);
    }

    /**
     * Gets a list of available converters.
     *
     * @return array Lower-case converter name => fully qualified class name.
     */
    public function getConverters() {
        return $this->converters;
    }

    /**
     * Searches for classes implementing Convert in the same directory as this class.
     *
     * @return \Generator Lower-case converter name => class name.
     */
    private function findConverters() {
        /** @var \DirectoryIterator $file */
        foreach (new \DirectoryIterator(__DIR__) as $file) {
            // Filter non-PHP files.
            if ($file->getExtension() !== 'php')
                continue;

            $reflector = new \ReflectionClass(__NAMESPACE__ . '\\' . $basename = $file->getBasename('.php'));

            if ($reflector->isInstantiable() && $reflector->implementsInterface(Convert::class))
                yield strtolower($basename) => $reflector->getName();
        }
    }
}
