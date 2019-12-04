<?php

namespace SimoSca\PluginType\Composer;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;


class TypeSimoScaTestInstaller implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new DataInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}