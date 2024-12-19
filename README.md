# Exercice Double authentification OTP en PHP

## Quickly
> git clone https://github.com/Cyrhades/exercise_otp_php && cd exercise_otp_php && make build-env

ou dans le dossier courant

> git clone https://github.com/Cyrhades/exercise_otp_php . && make build-env

## Avec le Makefile
> make build-env

------------------

## Sans le Makefile
> docker-compose -p execise-otp-php -f ./.docker/docker-compose.yml up



Enjoy ;-)

Urls :
-------
Serveur HTTP : http://localhost

PhpMyAdmin : http://localhost:8080 

    - MYSQL_DATABASE=otp_exercise
    - MYSQL_USER=user_otp
    - MYSQL_PASSWORD=2wIt0PkhQ6kR51j7Z3BmPA

Répertoires :
------------
Base de données : ./project/db
Projet Symfony : ./project/web

