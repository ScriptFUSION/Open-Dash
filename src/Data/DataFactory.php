<?php
namespace ScriptFUSION\OpenDash\Data;

use ScriptFUSION\OpenDash\Structure\StaticClass;

final class DataFactory {
    use StaticClass;

    public static function createData($data, $error = '') {
        if ($data instanceof Data)
            return $data;

        if ($data instanceof \Traversable || is_array($data) || is_object($data))
            return new StructuredData($data, $error);

        return new StringData("$data", $error);
    }
}
