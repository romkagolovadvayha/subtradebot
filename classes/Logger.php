<?php

namespace TRADEBOT;

class Logger
{
    private $dir;
    private $total;

    public function __construct($dir)
    {
        $this->dir = $dir;
    }

    public function execute($message)
    {
        $this->total .= "\n$message";
        $time = date('d.m.Y H:i:s', time());
        error_log("$time: $message" . PHP_EOL, 3, $this->dir);
    }

    public function getTotalLogs() {
        return $this->total;
    }
}