<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Request;

use Scraper\Scraper\Attribute\Scraper;

#[Scraper(path: 'api/storesearch/')]
class SteamSearchRequest extends SteamRequest
{
    public function setTerm(string $term): self
    {
        $this->parameters['term'] = $term;

        return $this;
    }
}
