#!/bin/bash

# Vérifier si le dossier n'existe pas
if [ ! -d "/var/www/html/" ]; then
  mkdir -p /var/www/html/
fi

# Vérifier si le dossier est vide
if [ -z "$(ls -A /var/www/html/)" ]; then
  mv /tmp/.htaccess  /var/www/html/public/.htaccess
  echo '   ___  ___  ________  ________  ___  __                   ________  _______   ___  ___            '  
  echo '  |\  \|\  \|\   __  \|\   ____\|\  \|\  \                |\   __  \|\  ___ \ |\  \|\  \           ' 
  echo '  \ \  \\\  \ \  \|\  \ \  \___|\ \  \/  /|_  ____________\ \  \|\  \ \   __/|\ \  \ \  \          '
  echo '   \ \   __  \ \   __  \ \  \    \ \   ___  \|\____________\ \  \\\  \ \  \_|/_\ \  \ \  \         '
  echo '    \ \  \ \  \ \  \ \  \ \  \____\ \  \\ \  \|____________|\ \  \\\  \ \  \_|\ \ \  \ \  \____    '
  echo '     \ \__\ \__\ \__\ \__\ \_______\ \__\\ \__\              \ \_______\ \_______\ \__\ \_______\  '
  echo '      \|__|\|__|\|__|\|__|\|_______|\|__| \|__|               \|_______|\|_______|\|__|\|_______|  '
  echo ' '
  echo 'Votre environnement est pret !'
  echo ' '
  echo 'Site Web http://localhost'
  echo 'PhpMyAdmin : http://localhost:8080'
fi

# Démarrer PHP-FPM et arrêter la sortie dans la console
php-fpm > /dev/null 2>&1

exec "$@" > /dev/null 2>&1