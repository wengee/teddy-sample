#!/bin/bash

start_app()
{
    echo -n `date +'[%Y-%m-%d %H:%M:%S]'` "Starting server ... "
    php ./index.php &
    PID=$!
    echo "OK"
    sleep 1
}

restart_app()
{
    echo `date +'[%Y-%m-%d %H:%M:%S]'` "Restart server after 3 seconds."
    sleep 1
    kill $PID
    sleep 2
}

inotify_wait()
{
    inotifywait -e close_write,modify,create,move,delete --format "%w%f %e" -mrq `pwd` | while read FILE EVENT; do
        case "$FILE" in
        *.php)
            echo `date +'[%Y-%m-%d %H:%M:%S]'` "$FILE" "$EVENT"
            return 0
        ;;
        esac
    done
}

sigint_handler()
{
    kill $PID
    exit
}

trap sigint_handler INT TERM

while true; do start_app; inotify_wait; restart_app; done
