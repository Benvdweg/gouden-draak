#!/bin/bash

# Exporteer de dev database naar een SQL-bestand
mysqldump -u root -p --no-create-info dev.gouden_draak > dev.gouden_draak_dump.sql

# Importeer het SQL-bestand in de test database
mysql -u root -p dev.gouden_draak < dev.gouden_draak_dump.sql

# Verwijder het SQL-bestand
rm dev.gouden_draak_dump.sql

