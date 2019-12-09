<?php


namespace SimoSca\Composer\Joomla\Command;


use Composer\Command\BaseCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Execute via "./composer.phar my-plugin-command"
 * Class LightningEchoCommand
 * @package Logotel\Lightning\Composer\Joomla\Command
 */
class LightningEchoCommand extends BaseCommand
{
    protected $cmd = "my-plugin-command";

    protected function configure()
    {
        $this->setName($this->cmd);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Command execution ({$this->cmd})");
        $output->writeln("echo!!!");
        $output->writeln("Done ({$this->cmd})");
        echo 1;
    }
}