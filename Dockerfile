FROM mediawiki:1.43-fpm AS os-deps

RUN apt update && apt upgrade -y; apt install -y net-tools supervisor

FROM os-deps AS setup

# Install Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY composer.json /var/www/html/composer.local.json
RUN chown -R www-data:www-data /var/www/html/composer.local.json

RUN composer config --no-interaction --no-plugins allow-plugins.composer/installers true
RUN composer update --no-interaction --no-dev

COPY services/mediawiki/php-config.ini /usr/local/etc/php/conf.d/php-config.ini
COPY services/mediawiki/parts/ /var/www/html/ls_snippets
COPY assets/ /var/www/html/resources/assets

COPY services/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

FROM setup AS caddy-setup

ENV XDG_DATA_HOME=/data
COPY --from=caddy:2.9-alpine /usr/bin/caddy /usr/bin/caddy

COPY ./services/caddy/Caddyfile /etc/caddy/Caddyfile

RUN chown -R www-data:www-data /var/www/html

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
