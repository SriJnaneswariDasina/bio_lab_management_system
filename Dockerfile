FROM php:8.2-apache

# Enable Apache Rewrite module if needed
RUN a2enmod rewrite

# Copy all your files to the web server's root
COPY . /var/www/html/
