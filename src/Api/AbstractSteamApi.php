<?php

declare(strict_types=1);

namespace Scraper\ScraperSteam\Api;

use Scraper\Scraper\Api\AbstractApi;
use Scraper\Scraper\Exception\ScraperException;

abstract class AbstractSteamApi extends AbstractApi
{
    /**
     * @return array<mixed>
     *
     * @throws ScraperException
     */
    protected function decode(): array
    {
        $content = json_decode($this->response->getContent(), true, 512, \JSON_THROW_ON_ERROR);

        if (!\is_array($content)) {
            throw new ScraperException('Steam response is not a JSON object');
        }

        return $content;
    }

    /**
     * @template T of object
     *
     * @param array<mixed>    $data
     * @param class-string<T> $type
     *
     * @return T
     */
    protected function deserialize(array $data, string $type): object
    {
        $json = json_encode($data, \JSON_THROW_ON_ERROR);

        return $this->serializer->deserialize($json, $type, 'json');
    }
}
