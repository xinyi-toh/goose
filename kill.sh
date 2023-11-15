#!/usr/bin/env sh

set -x
docker kill application
docker rm application

docker kill goose_git-server_1
docker rm goose_git-server_1
