<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Model\Miscellaneous;

class ReleaseDate
{
    public bool $comingSoon = false;
    // Human readable and localized by Steam, e.g. "9 juil. 2013"
    public string $date = '';
}
