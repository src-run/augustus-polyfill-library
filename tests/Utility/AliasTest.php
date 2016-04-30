<?php

/*
 * This file is part of the `augustus-polyfill-library` project.
 *
 * (c) 2016 Rob Frawley 2nd(rmf) <rmf AT src DOT run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SR\Polyfill\Tests\Utility;

use SR\Polyfill\Utility\Alias;

/**
 * Class ClassAliasTest.
 *
 * @package SR\Polyfill\Tests\Utility
 */
class AliasTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function testToRootNamespace()
    {
        $this->assertFalse(class_exists('Alias'));
        $this->assertTrue(Alias::toRootNamespace('SR\Polyfill\Utility\Alias'));
        $this->assertTrue(class_exists('Alias'));

        $toInstantiate = 'Alias';
        $instance = new $toInstantiate();

        $this->assertSame('SR\Polyfill\Utility\Alias', get_class($instance));
    }

    public function testToRootNamespaceOnInvalidClassName()
    {
        $this->assertFalse(Alias::toRootNamespace('SR\Polyfill\Does\Not\Exist'));
    }

    public function testToRootNamespaceOnRootClassAlreadyExists()
    {
        $this->assertFalse(Alias::toRootNamespace('SR\Polyfill\Does\Exist\In\Root\Namespace\Exception'));
    }

    public function testToRootNamespaceOnRootClassName()
    {
        $this->assertFalse(Alias::toRootNamespace('Exception'));
    }

    public function tearDown()
    {
        parent::tearDown();
    }
}


/* EOF */
