FROM alpine:3.10

RUN apk --no-cache add php7 php7-fpm php7-json php7-curl php7-pdo php7-sqlite3 \
    php7-mbstring nginx supervisor curl sqlite

COPY ./conf/nginx.conf /etc/nginx/nginx.conf
COPY ./conf/fpm-pool.conf /etc/php7/php-fpm.d/www.conf
COPY ./conf/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN chown -R nobody.nobody /run && \
    chown -R nobody.nobody /var/lib/nginx && \
    chown -R nobody.nobody /var/tmp/nginx && \
    chown -R nobody.nobody /var/log/nginx && \
    chown -R nobody.nobody /home

RUN mkdir -p /var/www/users

USER nobody

WORKDIR /var/www/users
COPY --chown=nobody ./ /var/www/users/

EXPOSE 8080

CMD php /var/www/users/migration/migration.php && /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
