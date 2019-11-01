<?php
declare(strict_types=1);

namespace adeynes\asyncio;

use pocketmine\scheduler\AsyncTask;
use pocketmine\Server;

abstract class AsyncIOTask extends AsyncTask
{

    /** @var bool */
    protected $success = false;

    public function setSuccess(bool $success): void
    {
        $this->success = $success;
    }

    public function onCompletion(Server $server): void
    {
        $this->checkSuccess($server);
    }

    abstract protected function checkSuccess(Server $server): void;

}