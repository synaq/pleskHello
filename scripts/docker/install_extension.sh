#!/bin/bash
composer build
docker exec `docker ps | awk '/willemnviljoen\/plesk-devel/ {print $NF}'` /usr/sbin/plesk bin extension -i /opt/project/dist/synaq-plesk-hello.zip
