<?php

namespace SimoSca\Composer\Joomla\Command;

use Composer\Plugin\Capability\CommandProvider;

class LightningCommandProvider implements CommandProvider
{

    public function getCommands()
    {
        return [
            new LightningEchoCommand()
        ];
    }
}