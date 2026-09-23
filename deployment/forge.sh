#!/usr/bin/env bash

$CREATE_RELEASE()

cd $FORGE_RELEASE_DIRECTORY

composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader
npm ci --no-audit --no-fund
npm run build
vendor/bin/jigsaw build production --quiet
css_version=$(sha256sum source/css/tailwind.css | cut -c1-16)
cp "source/css/tailwind-${css_version}.css" public/css/

$ACTIVATE_RELEASE()
