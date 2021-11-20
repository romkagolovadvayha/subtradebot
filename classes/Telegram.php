<?php

namespace TRADEBOT;

class Telegram
{
    public static function send($message)
    {
        $config = \TRADEBOT\Config::getInstance();
        $url = $config->settingApp->bot_api . '/sendMessage.php';
      	$post = [
            'hash' => $config->settingApp->message_hash,
            'message' => $message,
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT_MS, 150);
        curl_exec($ch);
        curl_close($ch);
    }
}