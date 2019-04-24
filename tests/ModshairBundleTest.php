<?php

/*
 * This file is part of [package name].
 *
 * (c) John Doe
 *
 * @license LGPL-3.0-or-later
 */

namespace Chuckki\ModshairBundle\Tests;

use Chuckki\ModshairBundle\ModshairBundle;
use PHPUnit\Framework\TestCase;

class ModshairBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new ModshairBundle();

        $this->assertInstanceOf('Chuckki\ModshairBundle\ModshairBundle', $bundle);
    }
}
