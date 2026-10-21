Scraper Steam
=============

![Packagist version](https://flat.badgen.net/packagist/v/rem42/scraper-steam)
![Packagist license](https://flat.badgen.net/github/license/rem42/scraper-steam)

Scraper for the public Steam store endpoints (no API key required).

Installation
------------

````bash
composer require rem42/scraper-steam
````

Requirement
-----------

- PHP >= 8.4

Usage
-----

````php
use Scraper\Scraper\Client;
use Scraper\ScraperSteam\Request\SteamAppRequest;
use Scraper\ScraperSteam\Request\SteamPlayersRequest;
use Scraper\ScraperSteam\Request\SteamSearchRequest;

$client = new Client($httpClient); // any Symfony HttpClientInterface

// App details (store page data)
$app = $client->send((new SteamAppRequest())->setAppId(570)->setLanguage('french')->setCountry('FR'));
$app->name;          // "Dota 2"
$app->genres;        // array<Genre>
$app->priceOverview; // null for free-to-play apps

// Store search
$search = $client->send((new SteamSearchRequest())->setTerm('portal')->setLanguage('french')->setCountry('FR'));
$search->items;

// Current players
$players = $client->send((new SteamPlayersRequest())->setAppId(570));
$players->playerCount;
````

Endpoints
---------

| Request               | Endpoint                                                        |
|-----------------------|-----------------------------------------------------------------|
| `SteamAppRequest`     | `store.steampowered.com/api/appdetails`                         |
| `SteamSearchRequest`  | `store.steampowered.com/api/storesearch/`                       |
| `SteamPlayersRequest` | `api.steampowered.com/ISteamUserStats/GetNumberOfCurrentPlayers/v1/` |
