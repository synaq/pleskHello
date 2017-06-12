#!/bin/bash
docker exec -it `docker ps | awk '/willemnviljoen\/plesk-devel/ {print $NF}'` /bin/bash
