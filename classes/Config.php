<?php

namespace TRADEBOT;

class Config
{
    /**
     * Экземпляр класса
     *
     * @var Config
     */
    private static $Instance;

    public $settingApp;

    /**
     * Инициализация конфигурации.
     */
    private function __construct()
    {
        $this->settingApp = new Settings();
    }

    /**
     * Получить экземпляр класса
     *
     * @return Config
     */
    public static function getInstance()
    {
        if (!self::$Instance) {
            self::$Instance = new Config();
        }

        return self::$Instance;
    }
}
