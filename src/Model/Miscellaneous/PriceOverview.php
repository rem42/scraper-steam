<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Model\Miscellaneous;

class PriceOverview
{
    public string $currency;
    // Amounts are in the smallest currency unit (cents)
    public int $initial;
    public int $final;
    // Only present on the app details endpoint, not on search results
    public ?int $discountPercent = null;
}
