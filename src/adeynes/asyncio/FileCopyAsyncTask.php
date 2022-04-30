<?php
declare(strict_types=1);

namespace adeynes\asyncio;

use pocketmine\Server;

class FileCopyAsyncTask extends FileOperationTask
{

    /** @var string */
    protected string $destination;

    public function __construct(string $file, string $destination)
    {
        $this->destination = $destination;
        parent::__construct($file);
    }

    public function onRun(): void
    {
        $this->setSuccess(copy($this->file, $this->destination));
    }

    protected function checkSuccess(Server $server): void
    {
        if (!$this->success) {
            $server->getLogger()->error("Unable to copy file {$this->file} to {$this->destination}");
        } else {
            $server->getLogger()->debug("Copied file {$this->file} to {$this->destination}");
        }
    }

}