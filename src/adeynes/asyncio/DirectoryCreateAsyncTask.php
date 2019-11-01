<?php
declare(strict_types=1);

namespace adeynes\asyncio;

use pocketmine\Server;

class DirectoryCreateAsyncTask extends DirectoryOperationTask
{

    public function onRun(): void
    {
        mkdir($this->directory);
        $this->setSuccess(is_dir($this->directory));
    }

    protected function checkSuccess(Server $server): void
    {
        if (!$this->success) {
            $server->getLogger()->error("Unable to create directory {$this->directory}");
        } else {
            $server->getLogger()->debug("Created directory {$this->directory}");
        }
    }

}