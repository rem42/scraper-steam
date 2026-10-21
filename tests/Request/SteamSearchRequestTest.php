<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Tests\Request;

use Scraper\ScraperSteam\Model\SteamSearch;
use Scraper\ScraperSteam\Model\SteamSearchItem;
use Scraper\ScraperSteam\Request\SteamSearchRequest;

/**
 * @internal
 */
class SteamSearchRequestTest extends AbstractRequestTestCase
{
    public function testSteamSearchRequest(): void
    {
        $client = $this->getClient('search.json');

        $request = new SteamSearchRequest();
        $request
            ->setTerm('portal')
            ->setLanguage('french')
            ->setCountry('FR')
        ;

        $result = $client->send($request);

        $this->assertInstanceOf(SteamSearch::class, $result);
        $this->assertSame(10, $result->total);
        $this->assertContainsOnlyInstancesOf(SteamSearchItem::class, $result->items);

        $first = $result->items[0];
        $this->assertSame('Portal 2', $first->name);
        $this->assertSame(620, $first->id);
        $this->assertSame('95', $first->metascore);
        $this->assertNotNull($first->price);
        $this->assertSame('EUR', $first->price->currency);
        $this->assertNull($first->price->discountPercent);
    }

    public function testQueryContainsTerm(): void
    {
        $request = new SteamSearchRequest();
        $request
            ->setTerm('portal')
        ;

        $this->assertSame(['term' => 'portal'], $request->getQuery());
    }
}
