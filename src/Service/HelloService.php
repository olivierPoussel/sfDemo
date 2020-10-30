<?php

namespace App\Service;

use Monolog\Logger;

class HelloService {

    /** @var Logger */
    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function hello()
    {
        $this->logger->debug('[HelloService][hello] ok');

        return "hello";
    }
}