<?php

namespace TRADEBOT;

class TradeBotRepository
{
    /**
     * @var \PDO
     */
    private $PDO;

    public function __construct($PDO)
    {
        $this->PDO = $PDO;
    }

    public function getCurrency($currency)
    {
        $params = [':currency_name' => $currency];

        try {
            $query = 'SELECT * FROM `currency` WHERE `currency_name`=:currency_name';

            $stmt = $this->PDO->prepare($query);
            $stmt->execute($params);
            $object                     = $stmt->fetchObject();
            $object                     = !empty($object) ? get_object_vars($object) : [];
        } catch (\PDOException $e) {
            echo "Failed to get DB handle: " . $e->getMessage() . "\n";
            exit;
        }

        return $object ?? null;
    }

    public function addCurrency($currency, $createDate)
    {
        $stmt   = $this->PDO->prepare(
            'INSERT currency SET currency_name=:currency_name, create_at=:create_at'
        );
        $params = [
            ':currency_name'        => $currency,
            ':create_at'        => $createDate,
        ];
        $result = $stmt->execute($params);

        return $result;
    }

    public function updateCurrency($currencyName, $maxPrice)
    {
        $params = [
            ':currency_name' => $currencyName, ':max_price' => $maxPrice,
        ];
        $stmt   = $this->PDO->prepare(
            "UPDATE currency SET `max_price` = :max_price WHERE `currency_name` = :currency_name"
        );
        $stmt->execute($params);
    }

}
