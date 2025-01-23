#!/bin/bash

# Attendre que le container PHP soit prêt
echo "En attente du container PHP..."
until [ -d "/var/www/html/public/" ]; do
    echo "Le container PHP n'est pas encore prêt. Nouvelle tentative dans 5 secondes..."
    sleep 5
done

exec httpd-foreground