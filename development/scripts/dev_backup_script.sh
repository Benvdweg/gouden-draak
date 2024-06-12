#!/bin/bash

# Pas eventueel de variabelen aan
backup_dir="C:\xampp\htdocs\gouden-draak-backups\development"
development_dir="C:\xampp\htdocs\gouden-draak\development"
db_name="dev.gouden_draak"
db_user="root"
db_password=""
timestamp=$(date +%Y%m%d_%H%M%S)

backup_folder="$backup_dir/backup_$timestamp"
mkdir -p $backup_folder

# Maak een back-up van de development map
cp -r $development_dir $backup_folder/development_backup

# Maak een SQL-dump van de database
mysqldump -u $db_user -p $db_password $db_name > $backup_folder/$db_name.sql

echo "Back-up is voltooid en opgeslagen in $backup_folder"
read -n 1 -s key





