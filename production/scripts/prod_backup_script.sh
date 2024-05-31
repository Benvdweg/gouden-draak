#!/bin/bash

# Change variables if necessary
backup_dir="C:\xampp\htdocs\gouden-draak-backups\production"
production_dir="C:\xampp\htdocs\gouden-draak\production"
db_name="live.gouden_draak"
db_user="root"
db_password=""
timestamp=$(date +%Y%m%d_%H%M%S)

backup_folder="$backup_dir/backup_$timestamp"
mkdir -p $backup_folder

# Maak een back-up van de ontwikkelingsmap
cp -r $production_dir $backup_folder/production_backup

# Maak een SQL-dump van de database
mysqldump -u $db_user -p $db_password $db_name > $backup_folder/$db_name.sql

echo "Back-up is voltooid en opgeslagen in $backup_folder"
read -n 1 -s key
