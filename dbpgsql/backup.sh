#!/bin/bash

BACKUP_DIR="./dbpgsql/backups"
TIMESTAMP=$(date +'%Y%m%d%H%M%S')
BACKUP_FILE="$BACKUP_DIR/db_backup_$TIMESTAMP.sql"

mkdir -p $BACKUP_DIR

# Reemplaza 'db-pgsql' con el nombre correcto de tu contenedor PostgreSQL
docker exec adminer pg_dump -U homestead -d homestead > $BACKUP_FILE

