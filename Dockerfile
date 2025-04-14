FROM mediawiki:1.43 AS os-deps

RUN apt update && apt upgrade -y;

FROM os-deps AS setup

# Install Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY composer.json /var/www/html/composer.local.json

RUN composer config --no-plugins allow-plugins.composer/installers true
RUN composer update --no-dev

COPY services/mediawiki/parts/ /var/www/html/ls_snippets
COPY assets/ /var/www/html/resources/assets

# RUN composer install --no-dev && composer update
