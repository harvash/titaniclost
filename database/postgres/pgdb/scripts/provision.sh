#!/bin/bash
set -e
# Provision the Titanic DB 
#
# Setup monitoring ROLE
#
psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" --dbname "$POSTGRES_DB" <<-EOSQL
  CREATE ROLE pgwatch2 WITH LOGIN PASSWORD 'secret';
  ALTER ROLE pgwatch2 CONNECTION LIMIT 3;
  GRANT pg_monitor TO pgwatch2; 
  #
  #
  # Create Extensions
  CREATE EXTENSION pg_stat_statements;
  CREATE EXTENSION plpython3u;
  # 
  # Create Schema in titanicdb
  #
  CREATE SCHEMA titanic AUTHORIZATION postgres;
EOSQL
