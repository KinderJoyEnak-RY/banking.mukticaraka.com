FROM php:8.0-apache

# Install ekstensi PHP yang diperlukan
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Mengatur direktori kerja
WORKDIR /var/www/html

# Menyalin seluruh konten dari direktori saat ini ke dalam kontainer
COPY . .

#Tambahkan konfigurasi PHP untuk session.save_path
RUN echo "session.save_path = '/var/www/html/sessions'" >> /usr/local/etc/php/php.ini

# Mengekspos port 80 untuk akses web
EXPOSE 80

# Mengaktifkan mod_rewrite untuk Apache (jika diperlukan untuk .htaccess Anda)
RUN a2enmod rewrite
