<?php
declare(strict_types=1);

namespace adeynes\asyncio;

use pocketmine\scheduler\AsyncTask;
use pocketmine\Server;

abstract class AsyncIOTask extends AsyncTask
{

    /** @var bool */
    protected bool $success = false;

    public function setSuccess(bool $success): void
    {
        $this->success = $success;
    }

    public function onCompletion(): void
    {
        $this->checkSuccess(Server::getInstance());
    }

    abstract protected function checkSuccess(Server $server): void;

}