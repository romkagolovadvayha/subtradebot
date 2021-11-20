<?php

namespace TRADEBOT;

class GlobalBot
{
    public static function getBotSettings()
    {
        $config = \TRADEBOT\Config::getInstance();
        $url = $config->settingApp->bot_api . '/getBotSettings.php';
        $post = [
            'hash' => $config->settingApp->message_hash
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, 1);
    }
}