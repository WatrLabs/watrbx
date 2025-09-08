<?php

declare(strict_types=1);

namespace EnumType;

use WsdlToPhp\PackageBase\AbstractStructEnumBase;

/**
 * This class stands for LuaType EnumType
 * @subpackage Enumerations
 */
class LuaType extends AbstractStructEnumBase
{
    /**
     * Constant for value 'LUA_TNIL'
     * @return string 'LUA_TNIL'
     */
    const VALUE_LUA_TNIL = 'LUA_TNIL';
    /**
     * Constant for value 'LUA_TBOOLEAN'
     * @return string 'LUA_TBOOLEAN'
     */
    const VALUE_LUA_TBOOLEAN = 'LUA_TBOOLEAN';
    /**
     * Constant for value 'LUA_TNUMBER'
     * @return string 'LUA_TNUMBER'
     */
    const VALUE_LUA_TNUMBER = 'LUA_TNUMBER';
    /**
     * Constant for value 'LUA_TSTRING'
     * @return string 'LUA_TSTRING'
     */
    const VALUE_LUA_TSTRING = 'LUA_TSTRING';
    /**
     * Constant for value 'LUA_TTABLE'
     * @return string 'LUA_TTABLE'
     */
    const VALUE_LUA_TTABLE = 'LUA_TTABLE';
    /**
     * Return allowed values
     * @uses self::VALUE_LUA_TNIL
     * @uses self::VALUE_LUA_TBOOLEAN
     * @uses self::VALUE_LUA_TNUMBER
     * @uses self::VALUE_LUA_TSTRING
     * @uses self::VALUE_LUA_TTABLE
     * @return string[]
     */
    public static function getValidValues(): array
    {
        return [
            self::VALUE_LUA_TNIL,
            self::VALUE_LUA_TBOOLEAN,
            self::VALUE_LUA_TNUMBER,
            self::VALUE_LUA_TSTRING,
            self::VALUE_LUA_TTABLE,
        ];
    }
}
