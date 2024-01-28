FROM php:7.4-apache

ENV HOST=${HOST}
ENV DB_USERNAME=${DB_USERNAME}
ENV DB_PASSWORD=${DB_PASSWORD}
ENV DB_DATABASE=${DB_DATABASE}

# Install the PHP MySQL extension
RUN docker-php-ext-install mysqli pdo_mysql

# Enable Apache modules 
RUN a2enmod rewrite

# CMD ["php", "-t", "seeder.php"]