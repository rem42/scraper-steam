<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Request;

use Scraper\Scraper\Attribute\Scraper;

#[Scraper(path: 'api/appdetails')]
class SteamAppRequest extends SteamRequest
{
    public function setAppId(int $appId): self
    {
        $this->parameters['appids'] = $appId;

        return $this;
    }
}
