FROM php:8.2-cli

WORKDIR /var/www

# Telepítjük a szükséges PHP kiterjesztéseket
RUN apt-get update && apt-get install -y unzip git

# Másoljuk be a teljes forráskódot
COPY src/ /var/www

CMD ["php", "-S", "0.0.0.0:8000", "-t", "/var/www/src"]