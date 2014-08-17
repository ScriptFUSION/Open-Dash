<?php
namespace ScriptFUSION\OpenDash\Structure;

/**
 * Implements the static class pattern by disabling the instance constructor.
 */
trait StaticClass {
    final private function __construct() {}
}
