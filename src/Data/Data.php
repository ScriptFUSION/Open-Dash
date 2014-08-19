<?php
namespace ScriptFUSION\OpenDash\Data;

interface Data extends \JsonSerializable {
    /**
     * @return string
     */
    public function getError();

    /**
     * @return mixed
     */
    public function getData();

    /**
     * @return bool
     */
    public function isValid();
}
