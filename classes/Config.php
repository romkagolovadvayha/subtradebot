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

    /**
     * @var \PDO
     */
    public $PDO;

    public $settingApp;

    /**
     * Инициализация конфигурации.
     */
    private function __construct()
    {
        $this->settingApp = new Settings();
        try {
            $this->PDO = new \PDO(
                "mysql:host=" . $this->settingApp->db_host . ";dbname=" . $this->settingApp->db_name, $this->settingApp->db_user,
                $this->settingApp->db_password
            );
        } catch (\Exception $e) {
            echo "Failed to get DB handle: " . $e->getMessage() . "\n";
            exit;
        }
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
