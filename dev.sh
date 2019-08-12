#!/bin/sh

startup()
{
  php ./index.php &
  PID=$!
}

sigint_handler()
{
  kill $PID
  exit
}

trap sigint_handler INT TERM

while true; do
  echo 'Starting server...'
  startup
  echo 'Server is started.'

  if type fswatch >/dev/null 2>&1; then
    fswatch -1 --exclude "^.+\.[^p][^h][^p]$" -i -r `pwd`
  else
    inotifywait --event close_write,modify,create,move,delete --timefmt '%Y-%m-%d %H:%M:%S' --format '[%T] %w%f %e' --excludei "^.+\.[^p][^h][^p]$" -q -r `pwd`
  fi

  echo 'Restart server after 3 seconds.'
  kill $PID
  sleep 3
done
