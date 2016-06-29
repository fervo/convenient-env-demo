<?php

namespace AppBundle\Command;

use Redeye\DynamoDB\Schema;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('test')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $dynamodb = $this->getContainer()->get('foo');
    }
}
