<?php
namespace ScriptFUSION\OpenDash\DataProvider\System;

use ScriptFUSION\OpenDash\Convert\ConversionChain;
use ScriptFUSION\OpenDash\Data\DataFactory;
use ScriptFUSION\OpenDash\Data\SystemData;
use ScriptFUSION\OpenDash\DataProvider\DataProvider;
use Symfony\Component\Process\Process;

abstract class SystemDataProvider implements DataProvider {
    protected
        $command,
        $input
    ;

    private $conversionChain;

    protected function getConversionChain() {
        return $this->conversionChain ?: $this->conversionChain = new ConversionChain;
    }

    public function provideData() {
        $data = $this->execute();

        return DataFactory::createData($this->getConversionChain()->convert($data), $data->getError());
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
