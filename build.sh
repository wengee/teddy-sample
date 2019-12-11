#!/bin/bash

composer dump-autoload -a

MODE="$1"
if [ "$MODE" = "" ]; then
    MODE="production"
fi

php ./build/index.php --mode $MODE

composer dump-autoload
