<?php

namespace RedditConsole\Command;

use RedditApiClient\Reddit;
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
        $reddit = new Reddit;
        $links  = $reddit->getLinksBySubreddit($input->getArgument('subreddit'));
        foreach ($links as $link) {
            $output->writeln($link->getTitle());
        }
    }
}
