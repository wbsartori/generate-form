<?php

declare(strict_types=1);

namespace WBGenerateForm\Source\Core;
use Dotenv\Dotenv;

class Env
{
    private static int $directoryLevel = 5;

    private static string $filename = '.env';

    public static function make(string $filename = '.env', int $directoryLevel = 5): Env
    {
        self::$directoryLevel = $directoryLevel;
        self::$filename = $filename;
        (Dotenv::createImmutable(
            dirname(
                __DIR__,
                self::$directoryLevel
            ),
            self::$filename
        ))->load();
        return new self();
    }
}
