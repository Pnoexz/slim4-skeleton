###########################
FROM php:7.4-alpine AS base
###########################
WORKDIR /tmp

#########################
FROM base AS dependencies
#########################
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /tmp
ENV COMPOSER_VERSION 1.7.3

RUN apk add -y composer

COPY composer.json .
COPY composer.lock .

RUN composer install --no-dev --no-scripts --no-plugins
RUN composer dump-autoload

##################
FROM base AS final
##################
# WORKDIR /var/app
# COPY --from=dependencies /tmp/vendor vendor
#
# RUN apk update
# RUN apk --no-cache add supervisor php7-pdo php7-json
# RUN docker-php-ext-install pcntl pdo pdo_mysql json
#
# RUN mkdir var
# RUN chmod -R 0777 var
#
# RUN apk add apache2 php7-apache2
# COPY docker/Api.apache.conf /etc/apache2/httpd.conf
# COPY docker/Api.vhost.conf /etc/apache2/sites-available/000-default.conf
#
# COPY app app
# COPY bin bin
# COPY public public
# COPY src src
# COPY docker/Api.supervisord.conf supervisord.conf
# COPY .env .
#
# EXPOSE 80
#
# ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c", "/var/app/supervisord.conf"]
# RUN

# ENTRYPOINT [ "/bin/ash" ]
