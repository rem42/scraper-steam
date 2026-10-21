<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Model;

use Scraper\ScraperSteam\Model\Miscellaneous\Platforms;
use Scraper\ScraperSteam\Model\Miscellaneous\PriceOverview;

class SteamSearchItem
{
    public string $type;
    public string $name;
    public int $id;
    public string $tinyImage = '';
    // Steam returns the metascore as a string, and an empty string when there is none
    public string $metascore = '';
    public Platforms $platforms;
    public bool $streamingvideo = false;
    public ?string $controllerSupport = null;
    // Absent for free apps
    public ?PriceOverview $price = null;
}
