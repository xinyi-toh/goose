#!/bin/bash

# Download and install Docker Compose to the workspace
curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o docker-compose
chmod +x docker-compose
