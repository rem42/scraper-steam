<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Model\Miscellaneous;

class Genre
{
    // Steam serves genre ids as strings ("1", "2", ...)
    public string $id;
    public string $description;
}
