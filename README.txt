https://stackoverflow.com/questions/8684609/where-can-i-find-php-ini

docker build -t csvreader .

docker run --rm csvreader php -m
docker run --rm csvreader php --ini
docker run --rm csvreader php --ini | grep 'php.ini'
docker run --rm csvreader php -i | grep 'php.ini'
docker run --rm csvreader php index.php
docker run --rm csvreader ls