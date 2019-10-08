FROM alpine:3.10

ENV dir /var/www/users

RUN apk --no-cache add php7 php7-fpm php7-json php7-curl php7-pdo php7-pdo_sqlite php7-sqlite3 \
    php7-mbstring php7-phalcon nginx supervisor curl sqlite

COPY ./app/config/nginx.conf /etc/nginx/nginx.conf
COPY ./app/config/fpm-pool.conf /etc/php7/php-fpm.d/www.conf
COPY ./app/config/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN chown -R nobody.nobody /run && \
    chown -R nobody.nobody /var/lib/nginx && \
    chown -R nobody.nobody /var/tmp/nginx && \
    chown -R nobody.nobody /var/log/nginx && \
    chown -R nobody.nobody /home

RUN mkdir -p $dir

USER nobody

WORKDIR $dir
COPY --chown=nobody ./ $dir

EXPOSE 8080

CMD php ./vendor/phalcon/devtools/phalcon migration run && /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
