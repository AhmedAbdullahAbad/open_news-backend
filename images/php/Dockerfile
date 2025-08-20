FROM php:8.3-fpm-alpine

RUN apk update && apk add --no-cache \
    autoconf \
    gcc \
    g++ \
    make \
    zip \
    bash \
    unzip \
    git \
    vim \
    postgresql-dev \
    procps \
    jpeg-dev \
    libpng-dev \
    libzip-dev \
    oniguruma-dev


RUN docker-php-ext-configure gd --enable-gd --with-jpeg


RUN docker-php-ext-install gd pdo pdo_pgsql pdo_mysql zip pcntl mbstring exif bcmath intl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chmod a+x /usr/local/bin/composer

RUN pecl install redis && docker-php-ext-enable redis

RUN rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

WORKDIR /var/www/html/open_news-app

RUN addgroup -g 1000 open_news-app

RUN adduser -u 1000 -s /bin/bash -G open_news-app -D open_news-app

USER open_news-app

RUN echo 'alias a="php artisan"' >> ~/.bashrc

EXPOSE 9000

CMD ["php-fpm"]
