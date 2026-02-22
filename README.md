> https://stackoverflow.com/questions/8684609/where-can-i-find-php-ini <br>
> docker build -t csvreader . <br>

> docker run --rm csvreader php -m <br>
> docker run --rm csvreader php --ini <br>

> docker run --rm csvreader php --ini | grep 'php.ini' <br>
> docker run --rm csvreader php -i | grep 'php.ini' <br>

> docker run --rm csvreader php index.php
> docker run --rm csvreader ls