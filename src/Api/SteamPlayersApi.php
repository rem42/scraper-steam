<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Api;

use Scraper\Scraper\Exception\ScraperException;
use Scraper\ScraperSteam\Model\CurrentPlayers;

class SteamPlayersApi extends AbstractSteamApi
{
    public function execute(): object|array|bool|string
    {
        $content = $this->decode();

        if (!\is_array($content['response'] ?? null)) {
            throw new ScraperException('Steam player count response has no "response" key');
        }

        return $this->deserialize($content['response'], CurrentPlayers::class);
    }
}
