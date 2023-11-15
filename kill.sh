#!/usr/bin/env sh

set -x
docker kill application
docker rm application

docker kill git-server
docker rm git-server
