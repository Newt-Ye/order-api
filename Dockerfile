# 使用 PHP 7.4 與 Apache 映像
FROM php:7.4-apache

# 啟用 Apache mod_rewrite（適用於 Apache）
RUN a2enmod rewrite

# 安裝系統依賴與 PHP 擴展
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_mysql zip gd

# 設定工作目錄
WORKDIR /var/www/html

# 將專案文件複製到容器中
COPY . .

# 將 storage 和 bootstrap/cache 賦予寫入權限
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 啟動 PHP 服務
CMD ["apache2-foreground"]