<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Model\Miscellaneous;

class Screenshot
{
    public int $id;
    // Miniature (600x338)
    public string $pathThumbnail = '';
    // Image d'origine (1920x1080)
    public string $pathFull = '';
}
