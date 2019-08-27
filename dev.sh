#!/bin/bash

start_app()
{
    echo -n "Starting server ... "
    php ./index.php &
    PID=$!
    echo "[OK]"
}

restart_app()
{
    echo "Restart server after 3 seconds."
    sleep 3
}

inotify_wait()
{
    inotifywait -e close_write,modify,create,move,delete --format "%w%f" -mrq `pwd` | while read FILE; do
        if echo $FILE | grep -i -e "\.php$"; then
            return 0;
        fi
    done
}

sigint_handler()
{
    kill $PID
    exit
}

trap sigint_handler INT TERM

while true; do
    start_app
    inotify_wait
    restart_app
done
