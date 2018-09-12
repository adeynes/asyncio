<?php
declare(strict_types=1);

namespace adeynes\asyncio;

use pocketmine\Server;

class FileWriteAsyncTask extends AsyncIOTask
{

    /** @var string */
    protected $message;

    /** @var WriteMode */
    protected $mode;

    public function __construct(string $file, string $message, WriteMode $mode)
    {
        $this->message = $message;
        $this->mode = $mode;
        parent::__construct($file);
    }

    public function onRun(): void
    {
        $handle = fopen($this->file, $this->mode->getValue());

        if (!is_resource($handle)) {
            $this->setSuccess(false);
            return;
        }

        $this->setSuccess(fwrite($handle, $this->message) === false ?: true);
        fclose($handle);
    }

    protected function checkSuccess(Server $server): void
    {
        if (!$this->success) {
            $server->getLogger()->error("Unable to write to file {$this->file}");
        } else {
            $server->getLogger()->debug("Wrote to file {$this->file}");
        }
    }

}