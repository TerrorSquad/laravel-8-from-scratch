#!/usr/bin/env bash

FOLDER=/var/www/html/storage
# create laravel storage directory and its subdirectories
mkdir -p $FOLDER/app
mkdir -p $FOLDER/app/public
mkdir -p $FOLDER/framework/cache
mkdir -p $FOLDER/framework/sessions
mkdir -p $FOLDER/framework/testing
mkdir -p $FOLDER/framework/views
mkdir -p $FOLDER/logs

# Link storage directory to public directory
php /var/www/html/artisan storage:link

echo "Storage initialized" >> /var/www/html/storage/app/public/storage_init.txt
