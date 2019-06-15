#!/bin/bash

docker build -t "boarding_card_app" .

docker run --rm -d -v $(pwd):/var/www/html boarding_card_app