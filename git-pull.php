<?php

// автообновление из репы
exec('cd ~/bot22.lisbot.ru && git pull', $output);

echo $output;