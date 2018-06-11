FROM ubuntu:16.04
RUN apt-get update
RUN apt-get install -y apache2 
RUN apt-get install -y php 
RUN apt-get install -y libapache2-mod-php
    
# Update the PHP.ini file, enable <? ?> tags and quieten logging.

RUN sed -i "s/error_reporting = .*$/error_reporting = E_ERROR | E_WARNING | E_PARSE/" /etc/php/7.0/apache2/php.ini

RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

RUN a2enmod php7.0
RUN a2enmod rewrite
RUN a2enmod ssl

#VOLUME logs /var/log/apache2
# Manually set up the apache environment variables

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

# Expose apache.

EXPOSE 80
EXPOSE 443

# Copy this repo into place.

#VOLUME www /var/www/site
#ADD certs /etc/ssl/certs

# Update the default apache site with the config we created.

ADD ./config/000-default.conf /etc/apache2/sites-enabled/000-default.conf
#ADD ./config/000-default-ssl.conf /etc/apache2/sites-enabled/000-default-ssl.conf

# By default start up apache in the foreground, override with /bin/bash for interative.

CMD /usr/sbin/apache2ctl -D FOREGROUND