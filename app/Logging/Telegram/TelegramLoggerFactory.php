<?php
/**
 * Created by PhpStorm.
 * User: ladmin
 * Date: 24.10.2022
 * Time: 14:03
 */

namespace App\Logging\Telegram;

use Monolog\Logger;
class TelegramLoggerFactory
{
    public function __invoke(array $config)
    {
        $logger = new Logger('telegram');
        $logger->pushHandler(new TelegramLoggerHandler($config));

        return $logger;
    }
}