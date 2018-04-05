#!/usr/bin/env sh
set -x

cd /var/www/html/backend/ && \
git pull origin master && \
composer install 
