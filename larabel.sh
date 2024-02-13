#!/bin/bash

# Update list of available packages
sudo apt update

# Install Node.js
curl -sL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install nodejs

# Install MySQL
sudo apt install mysql-server

# Configure MySQL
mysql -u root <<-EOF
CREATE DATABASE databasename;
CREATE USER 'arckam'@'localhost' IDENTIFIED WITH mysql_native_password BY 'stark';
GRANT ALL PRIVILEGES ON databasename.* TO 'arckam'@'localhost';
EOF

# Install Nginx
sudo apt install nginx

# Configure Nginx
sudo cp /etc/nginx/sites-available/default /etc/nginx/sites-available/example.com
sudo nano /etc/nginx/sites-available/example.com
sudo ln -s /etc/nginx/sites-available/example.com /etc/nginx/sites-enabled/
sudo nginx -t
sudo service nginx restart

# Configure Gzip
sudo cat > /etc/nginx/conf.d/gzip.conf << EOF
gzip_comp_level 5;
gzip_min_length 256;
gzip_proxied any;
gzip_vary on;
gzip_types
application/atom+xml
application/javascript
application/json
application/rss+xml
application/vnd.ms-fontobject
application/x-font-ttf
application/x-web-app-manifest+json
application/xhtml+xml
application/xml
font/opentype
image/svg+xml
image/x-icon
text/css
text/plain
text/x-component;
EOF
sudo service nginx restart

# Install PHP
sudo apt install php-fpm
sudo apt install php-mysql php-common php-mbstring php-xml php-zip php-bcmath zip unzip php-curl

# Install Composer
sudo curl -sS https://getcomposer.org/installer -o ~/composer-setup.php
sudo php ~/composer-setup.php --install-dir=/usr/local/bin --filename=composer
sudo rm ~/composer-setup.php

# Configure PHP
sudo sed -i 's/^upload_max_filesize.*/upload_max_filesize = 10M/' /etc/php/7.4/fpm/php.ini
sudo sed -i 's/^post_max_size.*/post_max_size = 10M/' /etc/php/7.4/fpm/php.ini

sudo service php7.4-fpm restart

# Install Supervisor
sudo apt install supervisor

# Configure Supervisor
sudo nano /etc/supervisor/conf.d/example-laravel.conf
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start example-laravel-worker:*

# Configure Cron
sudo crontab -e

# Add known hosts
ssh-keyscan -H github.com >> ~/.ssh/known_hosts
# Setup SSH key
ssh-keygen -b 2048 -t rsa -f ~/.ssh/id_rsa -q -N ""
cat ~/.ssh/id_rsa.pub
