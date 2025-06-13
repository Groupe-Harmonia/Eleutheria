#!/bin/bash
set -fx;

/var/www/html/maintenance/run update --quick

# Used for setting up the database
if [[ -n "$ELEUTHERIA_PREPARE_DB" ]]; then
  rm -f /var/www/html/LocalSettings.php
  echo -e "LocalSettings.php deleted"
fi

exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
