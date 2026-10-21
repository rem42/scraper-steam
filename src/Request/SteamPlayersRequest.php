<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Request;

use Scraper\Scraper\Attribute\Scraper;

#[Scraper(host: 'api.steampowered.com', path: 'ISteamUserStats/GetNumberOfCurrentPlayers/v1/')]
class SteamPlayersRequest extends SteamRequest
{
    public function setAppId(int $appId): self
    {
        $this->parameters['appid'] = $appId;

        return $this;
    }
}
