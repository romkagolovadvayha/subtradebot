<?php

// автообновление бота из репы
exec('cd ~/bot22.lisbot.ru && git pull', $output);

echo $output;