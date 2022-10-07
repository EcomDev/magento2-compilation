#!/bin/bash

SCRIPT_NAME=$0
DIRECTORY=$(dirname $SCRIPT_NAME)

cd $DIRECTORY/build || exit 1

build_magento() {
  PREV_DIR=$(pwd)
  cd $1 || return
  composer install --no-dev --prefer-dist --ignore-platform-reqs --no-progress || exit 1
  cd $PREV_DIR || return
}

for BUILD in $(find ./ -mindepth 1 -maxdepth 1 -type d -exec echo {} \;)
do
  build_magento $BUILD &
done

wait
