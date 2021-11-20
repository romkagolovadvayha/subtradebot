<?php

namespace TRADEBOT;

class SumMax
{
    public static function set($sum)
    {
        $path = __DIR__ . '/../data/sumMax.txt';
        file_put_contents($path, $sum);
    }

    public static function get()
    {
        $path = __DIR__ . '/../data/sumMax.txt';
        return file_get_contents($path);
    }
}