<?php

// автообновление из репы
exec('git pull', $output);

echo $output;