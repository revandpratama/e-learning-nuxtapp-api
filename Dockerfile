FROM php:8.1-fpm


RUN docker-php-ext-install pdo pdo_mysql


RUN apt-get update

# Install useful tools
RUN apt-get -y install apt-utils nano wget dialog vim

# Install important libraries
RUN echo "\e[1;33mInstall important libraries\e[0m"
RUN apt-get -y install --fix-missing \
    apt-utils \
    build-essential \
    git \
    curl \
    libcurl4 \
    libcurl4-openssl-dev \
    zlib1g-dev \
    libzip-dev \
    zip \
    libbz2-dev \
    locales \
    libmcrypt-dev \
    libicu-dev \
    libonig-dev \
    libxml2-dev



RUN echo "\e[1;33mInstall important docker dependencies\e[0m" 
RUN docker-php-ext-install \
    exif \
    pcntl \
    bcmath \
    ctype \
    curl \
    iconv \
    xml \
    soap \
    pcntl \
    mbstring \
    bz2 \
    zip \
    intl



COPY ./src /var/www/html

# RUN apk add shadow && usermod -u 1000 www-data && groupmod -g 1000 www-data 
RUN chown -R www-data:www-data /var/www/html/storage


# RUN chmod +x start.sh
# RUN chmod +x artisan

# ENTRYPOINT ["start.sh"]
# # Install Postgre PDO
# RUN apt-get install -y libpq-dev \
#     && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
#     && docker-php-ext-install pdo pdo_pgsql pgsql

# Install redis and enable dependency
# RUN pecl install -o -f redis \
#     && rm -rf /tmp/pear \
#     && docker-php-ext-enable redis