<?php
declare(strict_types=1);

namespace adeynes\asyncio;

use pocketmine\Server;

class FileTouchAsyncTask extends AsyncIOTask
{

    public function onRun(): void
    {
        $handle = fopen($this->file, 'w');
        $this->setSuccess($success = is_resource($handle));

        if ($success) {
            fclose($handle);
        }
    }

    protected function checkSuccess(Server $server): void
    {
        if (!$this->success) {
            $server->getLogger()->error("Unable to touch file {$this->file}");
        } else {
            $server->getLogger()->debug("Touched file {$this->file}");
        }
    }

}