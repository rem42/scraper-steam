<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Tests\Request;

use Scraper\ScraperSteam\Model\CurrentPlayers;
use Scraper\ScraperSteam\Request\SteamPlayersRequest;

/**
 * @internal
 */
class SteamPlayersRequestTest extends AbstractRequestTestCase
{
    public function testSteamPlayersRequest(): void
    {
        $client = $this->getClient('players.json');

        $request = new SteamPlayersRequest();
        $request
            ->setAppId(570)
        ;

        $result = $client->send($request);

        $this->assertInstanceOf(CurrentPlayers::class, $result);
        $this->assertSame(907071, $result->playerCount);
        $this->assertSame(1, $result->result);
    }
}
