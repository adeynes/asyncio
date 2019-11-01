<?php
declare(strict_types=1);

namespace adeynes\asyncio;

use adeynes\asyncio\utils\ds\Enum;

/**
 * @method static self WRITE()
 * @method static self APPEND()
 */
final class WriteMode extends Enum
{

    private const WRITE = 'w';

    private const APPEND = 'a';

}