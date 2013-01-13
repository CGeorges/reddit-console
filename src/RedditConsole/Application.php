<?php

namespace RedditConsole;

use Symfony\Component\Console\Application as SymfonyApplication;
use RedditConsole\Commmand;

class Application extends SymfonyApplication
{
    const NAME = 'Reddit Console';
    const VERSION = '0.0.0';

    public function __construct()
    {
        parent::__construct(static::NAME, static::VERSION);
        $this->add(new Command\SubredditShow);
    }
}
