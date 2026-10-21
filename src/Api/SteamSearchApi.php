<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Api;

use Scraper\ScraperSteam\Model\SteamSearch;

class SteamSearchApi extends AbstractSteamApi
{
    public function execute(): object|array|bool|string
    {
        return $this->deserialize($this->decode(), SteamSearch::class);
    }
}
