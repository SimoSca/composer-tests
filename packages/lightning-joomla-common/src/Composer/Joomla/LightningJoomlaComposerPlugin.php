<?php

namespace SimoSca\Composer\Joomla;


use Composer\Composer;
use Composer\Config;
use Composer\EventDispatcher\Event;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\Capability\CommandProvider;
use Composer\Plugin\Capable;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\PluginInterface;
use Composer\Script\Event as EventScript;
use Composer\Script\ScriptEvents;
use SimoSca\Composer\Joomla\Command\LightningCommandProvider;

class LightningJoomlaComposerPlugin implements PluginInterface, EventSubscriberInterface, Capable
{
    /**
     * @var Composer
     */
    private $composer;

    /**
     * @var IOInterface
     */
    private $io;

    private $assetsSynchronized = false;

    /**
     * @param Composer $composer
     * @param IOInterface $io
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $this->composer = $composer;
        $this->io = $io;
    }

    public static function getSubscribedEvents()
    {
        return [
//            PluginEvents::INIT => [
//                ['onInit', 0]
//            ],
//            ScriptEvents::PRE_PACKAGE_INSTALL => [
//                ['onPreCommandRun', 0]
//            ],
            ScriptEvents::PRE_AUTOLOAD_DUMP => [
                ['onPreAutoloadDump', 0]
            ]
        ];
    }

    public function onPreAutoloadDump(EventScript $event)
    {
        $this->syncAssets();
    }


    private function syncAssets()
    {
        if ($this->assetsSynchronized) {
            return;
        }

        $this->assetsSynchronized = true;

        $composer = $this->composer;
        /** @var Config $c */
        $c = $composer->getConfig();
        // Project Dir
        $composerJsonPath = dirname($c->getConfigSource()->getName());


        // $thisPackagePath = realpath(implode(DIRECTORY_SEPARATOR, [__DIR__, '..', '..', '..']));
        $thisPackagePath = null;
        $repositoryManager = $composer->getRepositoryManager();
        $installationManager = $composer->getInstallationManager();
        $localRepository = $repositoryManager->getLocalRepository();

        $packages = $localRepository->getPackages();
        foreach ($packages as $package) {

            if ($package->getName() === 'logotel/lightning-joomla-common') {
                $thisPackagePath = $installationManager->getInstallPath($package);
                break;
            }
        }

        if (!is_null($thisPackagePath) && is_dir($thisPackagePath)) {
            $assetsDir = realpath($thisPackagePath . DIRECTORY_SEPARATOR . 'assets');
            $this->io->write("Copying assets from {$assetsDir} to {$composerJsonPath}...", false);
            $this->recurseCopy($assetsDir, $composerJsonPath);
            $this->io->write(" done");
        }

        //$v = $c->get('simosca');

        // Extras
        // $vendorPath = $composer->getConfig()->get('vendor-dir');

    }


    private function recurseCopy($src, $dst, $forceOverride = false)
    {
        $dir = opendir($src);
        if (!is_dir($dst)) {
            mkdir($dst);
        }
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    $this->recurseCopy($src . '/' . $file, $dst . '/' . $file, $forceOverride);
                } elseif ($forceOverride || !file_exists($dst . '/' . $file)) {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }

        closedir($dir);
    }

    /**
     * Used to provide plugin commands, if needed
     */
    public function getCapabilities()
    {
        return [
            CommandProvider::class => LightningCommandProvider::class
        ];
    }
}

// getConfigSource -> Composer\Config\JsonCOnfig\Source  | Composer\Json\JsonFile /var/www/html/composer.json
// getAuthConfigSource -> /root/.composer/auth.json
// raw() -> molte info come array associativo e nested