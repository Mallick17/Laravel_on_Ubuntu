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
   - Copy the example ```.env.example``` file to create a new ```.env``` configuration file to **Set Up Laravel**
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
      APP_NAME=Laravel<br>
      APP_ENV=local<br>
      APP_KEY=<br>
      APP_DEBUG=true<br>
      APP_TIMEZONE=UTC<br>
      APP_URL=http://localhost<br>
<br>
      APP_LOCALE=en<br>
      APP_FALLBACK_LOCALE=en<br>
      APP_FAKER_LOCALE=en_US<br>
<br>
      APP_MAINTENANCE_DRIVER=file<br>
      #APP_MAINTENANCE_STORE=database<br>
<br>
      PHP_CLI_SERVER_WORKERS=4<br>
<br>
      BCRYPT_ROUNDS=12<br>
<br>
      LOG_CHANNEL=stack<br>
      LOG_STACK=single<br>
      LOG_DEPRECATIONS_CHANNEL=null<br>
      LOG_LEVEL=debug<br>
<br>
      DB_CONNECTION=mysql<br>
      DB_HOST=127.0.0.1<br>
      DB_PORT=3306<br>
      DB_DATABASE=laravel<br>
      DB_USERNAME=root<br>
      DB_PASSWORD=password<br>
<br>
      SESSION_DRIVER=database<br>
      SESSION_LIFETIME=120<br>
      SESSION_ENCRYPT=false<br>
      SESSION_PATH=/<br>
      SESSION_DOMAIN=null<br>
<br>
      BROADCAST_CONNECTION=log<br>
      FILESYSTEM_DISK=local<br>
      QUEUE_CONNECTION=database<br>
<br>
      CACHE_STORE=database<br>
      CACHE_PREFIX=<br>
<br>
      MEMCACHED_HOST=127.0.0.1<br>
 <br>  
      REDIS_CLIENT=phpredis<br>
      REDIS_HOST=127.0.0.1<br>
      REDIS_PASSWORD=null<br>
      REDIS_PORT=6379<br>
<br>
      MAIL_MAILER=log<br>
      MAIL_HOST=127.0.0.1<br>
      MAIL_PORT=2525<br>
      MAIL_USERNAME=null<br>
      MAIL_PASSWORD=null<br>
      MAIL_ENCRYPTION=null<br>
      MAIL_FROM_ADDRESS="hello@example.com"<br>
      MAIL_FROM_NAME="${APP_NAME}"<br>
<br>
      AWS_ACCESS_KEY_ID=<br>
      AWS_SECRET_ACCESS_KEY=<br>
      AWS_DEFAULT_REGION=us-east-1<br>
      AWS_BUCKET=<br>
      AWS_USE_PATH_STYLE_ENDPOINT=false<br>
<br>
      VITE_APP_NAME="${APP_NAME}"<br>

   </details>



     
     
     
