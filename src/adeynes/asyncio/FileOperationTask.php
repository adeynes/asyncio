<?php
declare(strict_types=1);

namespace adeynes\asyncio;

abstract class FileOperationTask extends AsyncIOTask
{

    /** @var string */
    protected $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

}