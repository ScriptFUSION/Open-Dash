<?php
namespace ScriptFUSION\OpenDash\Convert;

interface Convert {
    /**
     * @param mixed $data
     * @return mixed
     */
    public function convert($data);

    /**
     * @param mixed $data
     * @return mixed
     */
    public function __invoke($data);
}
