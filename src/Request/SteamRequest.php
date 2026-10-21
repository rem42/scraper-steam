<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Request;

use Scraper\Scraper\Attribute\Method;
use Scraper\Scraper\Attribute\Scheme;
use Scraper\Scraper\Attribute\Scraper;
use Scraper\Scraper\Request\RequestQuery;
use Scraper\Scraper\Request\ScraperRequest;

#[Scraper(method: Method::GET, scheme: Scheme::HTTPS, host: 'store.steampowered.com')]
abstract class SteamRequest extends ScraperRequest implements RequestQuery
{
    /** @var array<string, int|string|bool> */
    protected array $parameters = [];

    /**
     * @return array<string, int|string|bool>
     */
    public function getQuery(): array
    {
        return $this->parameters;
    }

    /**
     * Language used for the returned texts, e.g. "french" or "english".
     */
    public function setLanguage(string $language): static
    {
        $this->parameters['l'] = $language;

        return $this;
    }

    /**
     * Country code used for prices and availability, e.g. "FR".
     */
    public function setCountry(string $country): static
    {
        $this->parameters['cc'] = $country;

        return $this;
    }
}
