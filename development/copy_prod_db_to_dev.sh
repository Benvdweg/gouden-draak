#!/bin/bash

# Configuration
PROD_DB="live.gouden_draak"
DEV_DB="dev.gouden_draak"
DB_USER="root"
DB_PASS="" 
PROD_HOST="localhost"
DEV_HOST="localhost"
DUMP_FILE="prod_db_dump.sql"

# Dump the production database
echo "Dumping production database..."
if mysqldump.exe -h "$PROD_HOST" -u "$DB_USER" --password="$DB_PASS" "$PROD_DB" > "$DUMP_FILE"; then
    echo "Production database dumped successfully."
else
    echo "Error dumping production database."
    exit 1
fi

# Restore to the development database
echo "Restoring to development database..."
if mysql.exe -h "$DEV_HOST" -u "$DB_USER" --password="$DB_PASS" "$DEV_DB" < "$DUMP_FILE"; then
    echo "Restore to development database successful."
else
    echo "Error restoring to development database."
    exit 1
fi

# Remove the temporary dump file
rm "$DUMP_FILE"

echo "Production database successfully copied to the development database."

read -n 1 -s -r -p "Press any key to close..."