#!/bin/bash

# This script is used to create a read only user.
# It is used across the infrastructure for other purposes, such as Grafana.

set -eufx

RED='\033[0;31m'
RESET='\033[0m'

if [ -r "/run/secrets/db_ro_password" ]; then
  ELEUTHERIA_DB_RO_PASSWORD=$(cat /run/secrets/db_ro_password)
fi

if [ -z "${ELEUTHERIA_DB_RO_PASSWORD:-}" ]; then
  # This part will only run if the environment variable is not set
  # Basically create a random password and output it.
  ELEUTHERIA_DB_RO_PASSWORD=$(openssl rand -base64 24)
  echo -e "Eleutheria's read only access password: $ELEUTHERIA_DB_RO_PASSWORD"
  echo -e "${RED}This will only show once! COPY THIS PASSWORD, or you will have to reset it yourself.${RESET}"
fi

# Use the environment variables for users and passwords
mariadb -uroot -p"$MARIADB_ROOT_PASSWORD" <<-EOSQL
  CREATE USER 'app_ro'@'%' IDENTIFIED BY '${ELEUTHERIA_DB_RO_PASSWORD}';
  GRANT SELECT, SHOW VIEW ON eleutheria.* TO 'app_ro'@'%';

  FLUSH PRIVILEGES;
EOSQL

echo "Created the read only user."
