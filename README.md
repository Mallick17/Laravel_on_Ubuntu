# Laravel on Ubuntu
Laravel Application Deployment
## Introduction
Laravel is a free and open source PHP framework that is used to create web applications. It is based on the Model-View-Controller (MVC) pattern and offers a wide range of features that make the development process faster, easier and more convenient. Laravel remains one of the most popular PHP frameworks due to its flexibility, large community and regular updates. It offers easy-to-use tools for authentication, routing, database management, and more.<br>
In this guide, I will document how to install Laravel on Ubuntu.
1. **Update & Upgrade the system**
   - To update system repositories and upgrade any packages, by running the foolowing command
   ```sh
   apt update
   apt upgrade
   ```
2. **Install Apache**
   - To run Laravel, we need to configure Apache on our server.
   - We will **Install, Start and Verify** by checking the status.
   ```sh
   apt install apache2
   systemctl start apache2
   systemctl status apache2
   ```
3. **Create database**
   - We also need to create a database for Laravel, We will install MySQL for the database.
     ```sh
     apt install mysql-server
     ```
   - Then connect to MySQL as root (the default password is empty so just press Enter)
     ```sh
     mysql -u root -p
     ```
   - Now create a new database for the Laravel
     ```sh
     CREATE DATABASE my_laravel;
     ```
   - Then create or alter database user (type username that you want instead of your_user or root) and specify password for it
     ```sh
     ## To creat new user
     CREATE USER 'your_user'@'localhost' IDENTIFIED BY 'user_password';
     ## To alter an existing user
     ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
     ```
   - Grant all root user access to the new user or existing user
     ```sh
     GRANT ALL ON laravel_db.* TO 'root'@'localhost';
     ```
   - Exit from MySQL
     ```sh
     exit
     ```
4. **Install PHP & Extensions Required for Laravel Project**
   - PHP is also required for Laravel. Command to install PHP and its extensions
     ```sh
     apt install php libapache2-mod-php php-mbstring php-cli php-bcmath php-json php-xml php-zip php-pdo php-common php-tokenizer php-mysql
     ```
   - Next, install PHP curl
     ```sh
     apt-get install php-curl
     ```
   - To check if PHP was installed on our server,
     ```sh
     php --version
     ```
5. **Install Composer**  
   - we need to install Composer which is package manager for PHP.
     ```sh
     curl -sS https://getcomposer.org/installer | php
     ```
   - Now we need to move the downloaded file ```composer.phar``` to the ```usr/local/bin/``` directory
     ```sh
     mv composer.phar /usr/local/bin/composer
     ```
   - Give the ```composer``` executable permission
     ```sh
     chmod +x /usr/local/bin/composer
     ```
   - To check if Composer was installed
     ```sh
     composer --version
     ```
6. **Install Laravel**
   - Change the working directory to the ```/var/www/html``` where our web files will reside
     ```sh
     cd /var/www/html
     ```
   - Install the Laravel Project or Clone the Laravel project repository from GitHub
     ```sh
     ## To create new Laravel Project
     composer create-project laravel/laravel laravelapp
     ```
     ```sh
     ## Clone the Laravel project repository from GitHub
     git clone https://github.com/Mallick17/sobha_2.0.git
     ```
   - Rename the cloned directory (e.g., from sobha_2.0 to Laravel) for easier management & Navigate into the Laravel project directory
     ```sh
     mv sobha_2.0 laravel
     cd Laravel
     ```
   - **Install Project Dependencies** & Use Composer to install all the Laravel project dependencies
     ```sh
     composer install
     ```
   - Verify the dependencies have been installed by checking the ```vendor``` folder
     ```sh
     ls
     ```
   - Copy the example ```.env.example``` file to create a new ```.env``` configuration file to **Set Up Laravel by Configuring the .env File**
     ```sh
     cp .env.example .env
     ```
   - Open the .env file to edit environment-specific settings
     ```sh
     vi .env
     ```
<details>
<summary>Follow the .env file and setup environment specific settings to access.</summary>
<br>

```env
# Application settings
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
#APP_MAINTENANCE_STORE=database

PHP_CLI_SERVER_WORKERS=4

# Security and encryption
BCRYPT_ROUNDS=12

# Logging configuration
LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

# Database configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=password

# Session settings
SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

# Queue and caching
BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database
CACHE_STORE=database
CACHE_PREFIX=

# Redis configuration
MEMCACHED_HOST=127.0.0.1
REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

# Mail settings
MAIL_MAILER=log
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

# AWS S3 Configuration
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

# Vite
VITE_APP_NAME="${APP_NAME}"
```
</details>

7. **Adjust Laravel permissions**
   - Assign the ownership of the Laravel project to the www-data user (used by Apache)
     ```sh
     chown -R www-data:www-data /var/www/html/laravel
     ```
   - Set the correct permissions for the storage directory
     ```sh
     chmod -R 775 /var/www/html/laravel/storage
     ```
8. **Check & Verify Laravel Installation**
   - To verify Laravel installation first navigate to the Laravel directory and Run Laravel Artisan to confirm the installation
     ```sh
     cd laravel
     php artisan
     ```
9. **Configure Apache Virtual Host**
    - Navigate to the Apache configuration directory
      ```sh
      cd /etc/apache2/sites-available/
      ```
   - Create or edit the Laravel configuration file
     ```sh
     vi /etc/apache2/sites-available/laravel.conf
     ```
     - Add the following configuration to set up the virtual host
       ```sh
       <VirtualHost *:80>
           ServerName 13.233.112.78
           DocumentRoot /var/www/html/laravel/public

           <Directory /var/www/html/laravel>
               AllowOverride All
           </Directory>

           ErrorLog ${APACHE_LOG_DIR}/error.log
           CustomLog ${APACHE_LOG_DIR}/access.log combined
       </VirtualHost>
       ```
10. **Enable Laravel Site and Apache Modules**
    - Enable the Laravel virtual host configuration
      ```sh
      a2ensite laravel.conf
      ```
    - Enable the Apache ```mod_rewrite``` module for URL rewriting
      ```sh
      a2enmod rewrite
      ```
    - Restart Apache to apply the changes
      ```sh
      systemctl restart apache2
      ```
11. **Finalize Laravel Setup**
    - Generate the application key
      ```sh
      php artisan key:generate
      ```
    - Run database migrations to set up the database schema
      ```sh
      php artisan migrate
      ```
---
# Securing a Laravel Application with Free SSL on Apache2
### 1. Laravel Virtual Host Configuration
- The virtual host configuration file for the Laravel application is located at:
  ```bash
  /etc/apache2/sites-available/laravel.conf
  ```
- File Contents:
  ```apache
  <VirtualHost *:80>
    ServerName sobhaofficial.com
    DocumentRoot /var/www/html/laravel/public

    <Directory /var/www/html/laravel>
        AllowOverride All
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
  </VirtualHost>
  ```
  - **Key Details**:
    - **ServerName**: `sobhaofficial.com` (the domain for the Laravel application).
    - **DocumentRoot**: Points to Laravel’s `public` directory.
    - **AllowOverride All**: Allows `.htaccess` functionality for Laravel's routing.
### 2. System Update and Certbot Installation
- Update the system and install Certbot with its Apache plugin to manage SSL certificates.
  ```bash
  sudo apt update
  sudo apt install certbot python3-certbot-apache -y ##install Certbot
  ```
### 3. Obtain and Configure SSL Certificate
- Use Certbot to request a free SSL certificate from Let's Encrypt and configure it automatically with Apache.
  ```bash
  sudo certbot --apache -d sobhaofficial.com
  ```
- **Process**:
  - Certbot detects the Laravel virtual host file (`laravel.conf`).
  - Follow the prompts:
    - Enter your email address for notifications.
    - Agree to the terms and conditions.
    - Press Enter, Ouput at End:-
      ```bash
      Deploying certificate
      Successfully deployed certificate for sobhaofficial.com to /etc/apache2/sites-available/laravel-le-ssl.conf
      Congratulations! You have successfully enabled HTTPS on https://sobhaofficial.com
      ```
### 4. Verify HTTPS Access
- Open a web browser and visit:
  ```plaintext
  https://sobhaofficial.com
  ```
- Ensure the connection is secure by checking for the padlock icon in the browser's address bar.
### 5. Test Automatic SSL Renewal
- Let's Encrypt SSL certificates are valid for 90 days. Certbot includes a timer to automatically renew certificates. Test this functionality to ensure proper setup.
  ```bash
  sudo certbot renew --dry-run
  ```
  - Expected Output: If the renewal test completes without errors, the automatic renewal is working correctly.

---
## Notes:
1. **Replace ```13.233.112.78``` with our ```server's IP``` address or domain name.**
2. **Ensure that the ```.env``` file matches your database and application environment settings.**
3. **After completing these steps, your Laravel application should be accessible at ```http://13.233.112.78```**


     


     

   







     
     
     
