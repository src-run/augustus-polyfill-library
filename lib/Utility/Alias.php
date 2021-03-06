<?php

/*
 * This file is part of the `src-run/augustus-silencer-library` project.
 *
 * (c) Rob Frawley 2nd <rmf@src.run>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace SR\Polyfill\Utility;

final class Alias
{
    /**
     * @param string $qualifiedName
     *
     * @return bool
     */
    final public static function toRootNamespace(string $qualifiedName) : bool
    {
        if (!self::exists($qualifiedName)) {
            return false;
        }

        $rootName = preg_replace('{[^\\\]*\\\}', '', $qualifiedName);

        if (self::exists($rootName) || $qualifiedName === $rootName) {
            return false;
        }

        return class_alias($qualifiedName, $rootName);
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    final private static function exists(string $name) : bool
    {
        return class_exists($name) || interface_exists($name) || trait_exists($name);
    }
}

/* EOF */
