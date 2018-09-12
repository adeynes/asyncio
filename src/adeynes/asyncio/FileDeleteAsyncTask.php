<?php
declare(strict_types=1);

namespace adeynes\asyncio;

use pocketmine\Server;

class FileDeleteAsyncTask extends AsyncIOTask
{

    public function onRun(): void
    {
        $this->setSuccess(unlink($this->file));
    }

    protected function checkSuccess(Server $server): void
    {
        if (!$this->success) {
            $server->getLogger()->error("Unable to delete file {$this->file}");
        } else {
            $server->getLogger()->debug("Deleted file {$this->file}");
        }
    }

}