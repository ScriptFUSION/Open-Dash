<?php
namespace ScriptFUSION\OpenDash\Structure;

/**
 * Creates instances of classes matching the specified interface or base class
 * found in the same directory as classes implementing this trait.
 */
trait ImplementationFinderFactory {
    /** @var array */
    private $implementations = [];

    /**
     * Creates an implementation matching the specified name constructed with the
     * specified arguments.
     *
     * @param string $name Implementation name.
     * @param array $arguments Implementation arguments.
     * @return object New implementation instance.
     */
    private function createImplementation($name, array $arguments = []) {
        if (!isset($this->implementations[$name]))
            throw new \RuntimeException("Converter not found: $name");

        return (new \ReflectionClass($this->implementations[$name]))->newInstanceArgs($arguments);
    }

    /**
     * Searches for classes implementing the specified interface or base class
     * in the same directory as this class.
     *
     * @param string $interfaceOrClass Interface or base class name.
     * @return \Generator Lower-case class name => fully qualified class name.
     */
    private function findImplementations($interfaceOrClass) {
        $self = new \ReflectionClass(__CLASS__);

        /** @var \DirectoryIterator $file */
        foreach (new \DirectoryIterator(dirname($self->getFileName())) as $file) {
            // Filter non-PHP files.
            if ($file->getExtension() !== 'php')
                continue;

            $basename = $file->getBasename('.php');

            $reflector = new \ReflectionClass("{$self->getNamespaceName()}\\$basename");

            if ($reflector->isInstantiable() &&
                (interface_exists($interfaceOrClass) && $reflector->implementsInterface($interfaceOrClass))
                || $reflector->isSubclassOf($interfaceOrClass)
            )
                $this->implementations[strtolower($basename)] = $reflector->getName();
        }

        return $this->implementations;
    }
}
