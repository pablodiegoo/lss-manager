@echo off
php bin/console hautelook:fixtures:load --purge-with-truncate -n %*
