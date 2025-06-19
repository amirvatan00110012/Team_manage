FROM dunglas/frankenphp:latest

# Install any PHP extensions you need, e.g. pcntl

RUN apt-get update && apt-get install -y \
     libpq-dev \
     && docker-php-ext-install pdo pdo_pgsql
RUN install-php-extensions pcntl
# Copy your Laravel app into the container

COPY . /app

WORKDIR /app

EXPOSE 8000

# Use the Octane command to start FrankenPHP explicitly
ENTRYPOINT ["php", "artisan", "octane:frankenphp"]
