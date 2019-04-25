<?php

/*
 * This file is part of [package name].
 *
 * (c) Dennis Esken
 *
 * @license LGPL-3.0-or-later
 */

namespace Chuckki\ModshairBundle\ContaoManager;

use Chuckki\ModshairBundle\ModshairBundle;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;

class Plugin implements BundlePluginInterface
{
    /**
     * {@inheritdoc}
     */
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(ModshairBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class]),
        ];
    }
}
