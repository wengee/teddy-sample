#!/bin/sh

start_app()
{
    if [ "$PID" = "" ]; then
        echo -n "Starting server ... "
        php ./index.php &
        PID=$!
        echo "[OK]"
    fi
}

restart_app()
{
    if [ "$PID" = "" ]; then
        echo "Restart server after 3 seconds."
        sleep 3
        start_app
    fi
}

sigint_handler()
{
    kill $PID
    exit
}

trap sigint_handler INT TERM

start_app
inotifywait -e close_write,modify,create,move,delete --format "%w%f" -mrq `pwd` | while read FILE_CHANGED; do
    if echo $FILE_CHANGED | grep -i -e "\.php$"; then
        if [ "$PID" != "" ]; then
            echo -n "Stoping server ... "
            kill $PID
            PID=""
            echo "[OK]"
            restart_app &
        fi
    fi
done
