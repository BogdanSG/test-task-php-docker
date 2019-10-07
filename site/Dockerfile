FROM alpine:3.10

RUN apk --no-cache add php7 php7-fpm php7-json php7-curl \
    php7-mbstring php7-phalcon nginx supervisor curl

COPY ./conf/nginx.conf /etc/nginx/nginx.conf
COPY ./conf/fpm-pool.conf /etc/php7/php-fpm.d/www.conf
COPY ./conf/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN chown -R nobody.nobody /run && \
    chown -R nobody.nobody /var/lib/nginx && \
    chown -R nobody.nobody /var/tmp/nginx && \
    chown -R nobody.nobody /var/log/nginx

RUN mkdir -p /var/www/site

USER nobody

WORKDIR /var/www/site
COPY --chown=nobody ./ /var/www/site/

EXPOSE 8080

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]