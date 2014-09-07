<?php
namespace ScriptFUSION\OpenDash\Model;

use ScriptFUSION\OpenDash\DataProvider\Script\PhpVersion;
use ScriptFUSION\OpenDash\DataProvider\System\ApacheVersion;
use ScriptFUSION\OpenDash\DataProvider\System\DistributionVersion;
use ScriptFUSION\OpenDash\DataProvider\System\KernelVersion;

class Version extends Model {
    public function __construct() {
        $this->addDataProviders([
            new KernelVersion,
            new PhpVersion,
            new ApacheVersion,
            new DistributionVersion,
        ]);
    }
}
