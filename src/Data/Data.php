<?php
namespace ScriptFUSION\OpenDash\Data;

interface Data extends \JsonSerializable {
    public function getError();

    public function getData();

    public function isValid();
}
