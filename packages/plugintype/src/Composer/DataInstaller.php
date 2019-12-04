<?php

namespace SimoSca\PluginType\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class DataInstaller extends LibraryInstaller
{
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
//        $prefix = substr($package->getPrettyName(), 0, 23);
//        if ('simosca/template-' !== $prefix) {
//            throw new \InvalidArgumentException(
//                'Unable to install template, simosca templates '
//                .'should always start their package name with '
//                .'"simosca/template-"'
//            );
//        }
        return 'storage/simosca-datapackage/'. $package->getPrettyName();
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType)
    {
        return 'simosca-data' === $packageType;
    }
}