FROM php:8.2-apache
WORKDIR /var/www/html
COPY . .
RUN chmod -R 777 data
EXPOSE 80