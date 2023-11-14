#!/usr/bin/env sh

set -x
docker kill application
docker rm application

docker kill git_server
docker rm git_server
