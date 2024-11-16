# Laravel on Ubuntu
Laravel Application Deployment
## Introduction
Laravel is a free and open source PHP framework that is used to create web applications. It is based on the Model-View-Controller (MVC) pattern and offers a wide range of features that make the development process faster, easier and more convenient. Laravel remains one of the most popular PHP frameworks due to its flexibility, large community and regular updates. It offers easy-to-use tools for authentication, routing, database management, and more.<br>
In this guide, I will document how to install Laravel on Ubuntu.
1. **Update & Upgrade the system**
   To update system repositories and upgrade any packages, by running the foolowing command
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
   - PHP is also required for Laravel. Run the following command to install PHP and its extensions
     ```sh
     apt install php libapache2-mod-php php-mbstring php-cli php-bcmath php-json php-xml php-zip php-pdo php-common php-tokenizer php-mysql
     ```
   - Next, install PHP curl
     ```sh
     apt-get install php-curl
     ```
   - To check if PHP was installed on our server, run the following command
     ```sh
     php --version
     ```
5. **Install Composer**  
