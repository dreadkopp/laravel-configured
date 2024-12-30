<?php

namespace Dreadkopp\LaravelConfigured\Facades;


use Closure;
use Illuminate\Support\Facades\Facade;
use InvalidArgumentException;

/**
 * @method static bool has(string $key)
 * @method static mixed get(array|string $key, mixed $default = null)
 * @method static array getMany(array $keys)
 * @method static string string(string $key, (Closure | string | null) $default = null)
 * @method static int integer(string $key, (Closure | int | null) $default = null)
 * @method static float float(string $key, (Closure | float | null) $default = null)
 * @method static bool boolean(string $key, (Closure | bool | null) $default = null)
 * @method static array array(string $key, (Closure | array | null) $default = null)
 * @method static array all()
 * @method static bool hasMacro(string $name)
 * @method static void flushMacros()
 *
 * @see \Illuminate\Config\Repository
 */
class Configured extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'configured';
    }

    public static function set(array|string $key, mixed $value = null): never
    {
        self::nope();
    }

    public static function prepend(string $key, mixed $value): never
    {
        self::nope();
    }

    public static function push(string $key, mixed $value): never
    {
        self::nope();
    }

    public static function macro(string $name, object|callable $macro): never
    {
        self::nope();
    }

    public static function mixin(object $mixin, bool $replace = true): never
    {
        self::nope();
    }

    protected static function nope(): never
    {
        throw new InvalidArgumentException('cannot manipulate configuration');
    }

}
