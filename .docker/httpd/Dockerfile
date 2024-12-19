FROM httpd:2.4-alpine

COPY custom.conf /usr/local/apache2/conf/custom.conf
COPY project.conf /usr/local/apache2/conf/project.conf
COPY 503.html /usr/local/apache2/htdocs/503.html


RUN printf "Include conf/custom.conf\n" >> /usr/local/apache2/conf/httpd.conf 

# Gestion du démarrage d'apache via wait-for-php.sh
COPY wait-for-php.sh /usr/local/bin/wait-for-php.sh
RUN chmod +x /usr/local/bin/wait-for-php.sh

ENTRYPOINT ["sh", "/usr/local/bin/wait-for-php.sh"]