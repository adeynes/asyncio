<?php
declare(strict_types=1);

namespace adeynes\asyncio;

use pocketmine\Server;

class DirectoryMoveAsyncTask extends DirectoryOperationTask
{

    /** @var string */
    protected string $new_directory;

    public function __construct(string $directory, string $new_directory)
    {
        $this->new_directory = $new_directory;
        parent::__construct($directory);
    }

    public function onRun(): void
    {
        $this->setSuccess(rename($this->directory, $this->new_directory));
    }

    public function checkSuccess(Server $server): void
    {
        if (!$this->success) {
            $server->getLogger()->error("Unable to move directory {$this->directory} to {$this->new_directory}");
        } else {
            $server->getLogger()->debug("Moved directory {$this->directory} to {$this->new_directory}");
        }
    }

}