#!/usr/bin/env bash

$CREATE_RELEASE()

cd $FORGE_RELEASE_DIRECTORY

composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
vendor/bin/jigsaw build production --quiet

$ACTIVATE_RELEASE()
