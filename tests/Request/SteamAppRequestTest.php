<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Tests\Request;

use Scraper\Scraper\Exception\ScraperException;
use Scraper\ScraperSteam\Model\Miscellaneous\Genre;
use Scraper\ScraperSteam\Model\SteamApp;
use Scraper\ScraperSteam\Request\SteamAppRequest;

/**
 * @internal
 */
class SteamAppRequestTest extends AbstractRequestTestCase
{
    public function testSteamAppRequest(): void
    {
        $client = $this->getClient('app_570.json');

        $request = new SteamAppRequest();
        $request
            ->setAppId(570)
        ;

        $result = $client->send($request);

        $this->assertInstanceOf(SteamApp::class, $result);
        $this->assertSame('Dota 2', $result->name);
        $this->assertSame(570, $result->steamAppid);
        $this->assertTrue($result->isFree);
        $this->assertTrue($result->platforms->windows);
        $this->assertSame(90, $result->metacritic?->score);
        $this->assertSame(14370, $result->recommendations?->total);
        $this->assertContainsOnlyInstancesOf(Genre::class, $result->genres);
        $this->assertNotEmpty($result->genres);
        $this->assertSame([1241930, 652720], $result->dlc);
    }

    public function testFreeAppHasNoPriceOverview(): void
    {
        $client = $this->getClient('app_570.json');

        $request = new SteamAppRequest();
        $request
            ->setAppId(570)
        ;

        $result = $client->send($request);

        $this->assertInstanceOf(SteamApp::class, $result);
        $this->assertNull($result->priceOverview);
    }

    public function testUnavailableAppThrows(): void
    {
        $client = $this->getClient('app_not_found.json');

        $request = new SteamAppRequest();
        $request
            ->setAppId(999999999)
        ;

        $this->expectException(ScraperException::class);

        $client->send($request);
    }

    public function testQueryContainsAppIdLanguageAndCountry(): void
    {
        $request = new SteamAppRequest();
        $request
            ->setAppId(570)
            ->setLanguage('french')
            ->setCountry('FR')
        ;

        $this->assertSame(['appids' => 570, 'l' => 'french', 'cc' => 'FR'], $request->getQuery());
    }
}
