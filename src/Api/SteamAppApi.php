<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Api;

use Scraper\Scraper\Exception\ScraperException;
use Scraper\ScraperSteam\Model\SteamApp;

/**
 * The appdetails endpoint wraps its payload under the app id: {"570": {"success": true, "data": {...}}}.
 */
class SteamAppApi extends AbstractSteamApi
{
    public function execute(): object|array|bool|string
    {
        $content = $this->decode();
        $entry = array_values($content)[0] ?? null;

        if (!\is_array($entry) || true !== ($entry['success'] ?? false) || !\is_array($entry['data'] ?? null)) {
            throw new ScraperException('Steam app details not available for this id');
        }

        return $this->deserialize($entry['data'], SteamApp::class);
    }
}
