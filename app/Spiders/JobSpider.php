<?php

namespace App\Spiders;

use Generator;
use RoachPHP\Downloader\Middleware\RequestDeduplicationMiddleware;
use RoachPHP\Extensions\LoggerExtension;
use RoachPHP\Extensions\StatsCollectorExtension;
use RoachPHP\Http\Response;
use RoachPHP\Spider\BasicSpider;
use RoachPHP\Spider\ParseResult;

class JobSpider extends BasicSpider
{
    public array $startUrls = [
        'https://larajobs.com'
    ];

    public array $downloaderMiddleware = [
        RequestDeduplicationMiddleware::class,
    ];

    public array $spiderMiddleware = [
        //
    ];

    public array $itemProcessors = [
        //
    ];

    public array $extensions = [
        LoggerExtension::class,
        StatsCollectorExtension::class,
    ];

    public int $concurrency = 2;

    public int $requestDelay = 1;

    /**
     * @return Generator<ParseResult>
     */
    public function parse(Response $response): Generator
    {
        $url = $response->filter('.py-12.bg-white div:nth-child(1) > div:nth-child(7) a')->link();
        $companyName =  $response->filter('.py-12.bg-white div:nth-child(1) > div:nth-child(7) a > div >div:nth-child(2) p:nth-of-type(1)')->text();
        $title =  $response->filter('.py-12.bg-white div:nth-child(1) > div:nth-child(7) a > div >div:nth-child(2) p:nth-of-type(2)')->text();
        $jobType =  $response->filter('.py-12.bg-white div:nth-child(1) > div:nth-child(7) a > div >div:nth-child(2) p:nth-of-type(3)')->text();
        $applyLink =  $url->getUri();

        yield $this->item([
            'companyName' => $companyName,
            'title' => $title,
            'jobType' => $jobType,
            'applyLink' => $applyLink,
        ]);

    }

}
