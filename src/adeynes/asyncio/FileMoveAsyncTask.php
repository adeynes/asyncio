<?php
declare(strict_types=1);

namespace adeynes\asyncio;

use pocketmine\Server;

class FileMoveAsyncTask extends AsyncIOTask
{

    /** @var string */
    protected $new_file;

    public function __construct(string $file, string $new_file)
    {
        $this->new_file = $new_file;
        parent::__construct($file);
    }

    public function onRun(): void
    {
        $this->setSuccess(rename($this->file, $this->new_file));
    }

    protected function checkSuccess(Server $server): void
    {
        if (!$this->success) {
            $server->getLogger()->error("Unable to move file {$this->file} to {$this->new_file}");
        } else {
            $server->getLogger()->debug("Moved file {$this->file} to {$this->new_file}");
        }
    }

}