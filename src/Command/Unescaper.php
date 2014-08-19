<?php
namespace ScriptFUSION\OpenDash\Command;

class Unescaper {
    public static function unescape($string) {
        return preg_replace('[\\\\(.)]', '\1', $string);
    }
}
