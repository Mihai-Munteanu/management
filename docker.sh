#!/usr/bin/env bash

echo "execute: $@"
docker-compose -f docker-compose.yml $@
