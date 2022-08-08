FROM lcsbaroni/php:7.4

# RUN docker-php-ext-install pdo pdo_mysql

COPY ./site /app

ARG PHP_MEMORY_LIMIT=512M
ENV PHP_MEMORY_LIMIT=$PHP_MEMORY_LIMIT

RUN composer install --no-dev --prefer-dist

RUN chown -R www-data:www-data /app/storage/framework/

RUN apk add gettext

ARG DB_HOST
ARG DB_PASSWORD
ARG DB_PORT
ARG MAIL_PASSWORD
ARG NEWRELIC_LICENSE_KEY
ARG CIRCLE_TAG=master

RUN echo "Version: ${CIRCLE_TAG} \nBuild date: $(date '+%Y-%m-%d %H:%M:%S')" >> /app/public/rev.txt

ENV DB_HOST=$DB_HOST
ENV DB_PASSWORD=$DB_PASSWORD
ENV DB_PORT=$DB_PORT
ENV MAIL_PASSWORD=$MAIL_PASSWORD
ENV NEWRELIC_LICENSE_KEY=$NEWRELIC_LICENSE_KEY

RUN envsubst < "/app/.env-prod" > "/app/.env"
