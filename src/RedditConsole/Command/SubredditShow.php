<?php

namespace RedditConsole\Command;

use Reddit\Api\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SubredditShow extends Command
{

    protected function configure()
    {
        $this->setName('subreddit:show');
        $this->addArgument(
            'subreddit',
            InputArgument::REQUIRED,
            'The subreddit to show'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $clientFactory = new Client\Factory;
        $client = $clientFactory->createClient();
        $getLinks = $client->getCommand(
            'GetLinksBySubreddit',
            [
                'subreddit' => 'programming',
            ]
        );
        $links = $getLinks->execute();
        foreach ($links as $link) {
            $output->writeln($link->title);
        }
    }
}
