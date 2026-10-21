<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Model;

class SteamSearch
{
    public int $total = 0;

    /** @var array<int, SteamSearchItem> */
    public array $items = [];
}
