<?php
namespace ScriptFUSION\OpenDash\DataProvider\System;

use ScriptFUSION\OpenDash\DataProvider\DataProvider;
use Symfony\Component\Process\Process;

abstract class SystemDataProvider extends DataProvider {
    protected
        $command,
        $input
    ;

    public function provideData() {
        return $this->getFilterChain()->filter($this->execute());
    }

    /**
     * @return SystemData Process output.
     */
    public function execute() {
        $process = new Process($this->command);
        isset($this->input) && $process->setInput($this->input);
        $process->run();

        return new SystemData($process->getOutput(), $process->getErrorOutput(), $process->getExitCode());
    }
}
