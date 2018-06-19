FROM richarvey/nginx-php-fpm:1.5.2

# Remove nginx-php-fpm branded default error pages
RUN rm -rf /var/www/errors/*

# Rewrite default nginx-php-fpm conf files
ADD conf/supervisord.conf /etc/supervisord.conf
ADD conf/nginx.conf /etc/nginx/nginx.conf

# Add php sources
ADD src/ /var/www/html/
