<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Model;

use Scraper\ScraperSteam\Model\Miscellaneous\Category;
use Scraper\ScraperSteam\Model\Miscellaneous\Genre;
use Scraper\ScraperSteam\Model\Miscellaneous\Metacritic;
use Scraper\ScraperSteam\Model\Miscellaneous\Platforms;
use Scraper\ScraperSteam\Model\Miscellaneous\PriceOverview;
use Scraper\ScraperSteam\Model\Miscellaneous\Recommendations;
use Scraper\ScraperSteam\Model\Miscellaneous\ReleaseDate;
use Scraper\ScraperSteam\Model\Miscellaneous\Screenshot;

class SteamApp
{
    // "game", "dlc", "demo", "movie", ...
    public string $type;
    public string $name;
    public int $steamAppid;
    public int $requiredAge = 0;
    public bool $isFree = false;
    public string $shortDescription = '';
    public string $detailedDescription = '';
    public string $aboutTheGame = '';
    public string $supportedLanguages = '';
    public string $headerImage = '';
    public ?string $website = null;

    /** @var array<int, int> */
    public array $dlc = [];

    /** @var array<int, string> */
    public array $developers = [];

    /** @var array<int, string> */
    public array $publishers = [];
    public Platforms $platforms;
    public ?Metacritic $metacritic = null;

    /** @var array<int, Genre> */
    public array $genres = [];

    /** @var array<int, Category> */
    public array $categories = [];

    /** @var array<int, Screenshot> */
    public array $screenshots = [];
    public ?ReleaseDate $releaseDate = null;
    // Absent for free-to-play apps
    public ?PriceOverview $priceOverview = null;
    public ?Recommendations $recommendations = null;
}
