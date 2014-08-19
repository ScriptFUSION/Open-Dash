<?php
namespace ScriptFUSION\OpenDash\Command;

class Command {
    private
        $name,
        $arguments
    ;

    public function __construct($name, array $arguments = []) {
        $this->name = "$name";
        $this->arguments = $arguments;
    }

    public function __toString() {
        return "$this->name";
    }

    /**
     * @return string
     */
    public function getName() {
        return "$this";
    }

    /**
     * @return Argument[]
     */
    public function getArguments() {
        return $this->arguments;
    }

    /**
     * @return array
     */
    public function renderArguments() {
        return array_map(function(Argument $arg) {
            return $arg->getValue();
        }, $this->arguments);
    }
}
