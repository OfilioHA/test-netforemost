<?php

namespace App\Patterns\Singleton;


class _BaseSingleton
{
    private static $instances = [];
    protected function __construct()
    {
    }
    protected function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): PdfGenerator
    {
        $cls = static::class;
        if (!isset(self::$instances[$cls])) {
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }
}
