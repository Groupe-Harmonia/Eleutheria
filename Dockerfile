FROM mediawiki:1.43-fpm AS os-setup

RUN apt update && apt upgrade -y; apt install -y net-tools supervisor

FROM os-setup AS caddy-setup

# Create caddy group + user
RUN groupadd --system caddy && useradd --system \
  --gid caddy \
  --create-home \
  --home-dir /var/lib/caddy \
  --shell /usr/sbin/nologin \
  --comment "Caddy web server" \
  caddy

RUN mkdir -p /data/caddy /usr/share/caddy /config/caddy && \
  chown caddy:caddy -R /data/caddy /usr/share/caddy /config/caddy

ENV XDG_CONFIG_HOME=/config
ENV XDG_DATA_HOME=/data

COPY --from=caddy:2.9-alpine /usr/bin/caddy /usr/bin/caddy

COPY ./services/caddy/Caddyfile /etc/caddy/Caddyfile

FROM caddy-setup AS setup

# Install Composer
COPY --from=composer /usr/bin/composer /usr/bin/composer
COPY composer.json /var/www/html/composer.local.json

RUN chown -Rc caddy:caddy /var/www
USER caddy

RUN composer config --no-interaction --no-plugins allow-plugins.composer/installers true
RUN composer update --no-interaction --no-dev

COPY services/mediawiki/php-config.ini /usr/local/etc/php/conf.d/php-config.ini
COPY services/mediawiki/parts/ /var/www/html/ls_snippets
COPY services/mediawiki/LocalSettings.php /var/www/html/LocalSettings.php
COPY assets/ /var/www/html/resources/assets

COPY services/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# root is required for supervisord
USER root
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]
