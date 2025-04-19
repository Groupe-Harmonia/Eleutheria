#!/bin/bash

/var/www/html/maintenance/run update --quick

exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
