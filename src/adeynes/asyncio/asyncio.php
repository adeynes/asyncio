<?php
declare(strict_types=1);

namespace adeynes\asyncio;

use pocketmine\Server;

class asyncio
{

    public static function submitTask(AsyncIOTask $task): void
    {
        Server::getInstance()->getAsyncPool()->submitTask($task);
    }

}