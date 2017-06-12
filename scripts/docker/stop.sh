#!/bin/bash
docker kill `docker ps | awk '/willemnviljoen\/plesk-devel/ {print $NF}'`
