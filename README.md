# MVC small project
> This is demo project for students

## Installation

1. You should have account on github.com (Register: https://github.com/join)

2. Open your terminal window.

3. Check if you have installed `composer`:

    ``` 
    $ composer -V 
    ```
    You should see something like this:
    ``` 
    $ Composer version 1.4.1 2017-03-10 09:29:45
    ```
4. Check PHP7 installation:

    ``` 
    $ php -v 
    ```
    You should see something like this:
    ``` 
    PHP 7.1.6-1~ubuntu16.04.1+deb.sury.org+1 (cli) (built: Jun  9 2017 08:26:34) ( NTS )
    Copyright (c) 1997-2017 The PHP Group
    Zend Engine v3.1.0, Copyright (c) 1998-2017 Zend Technologies
        with Zend OPcache v7.1.6-1~ubuntu16.04.1+deb.sury.org+1, Copyright (c) 1999-2017, by Zend Technologies
        with Xdebug v2.5.5, Copyright (c) 2002-2017, by Derick Rethan
    ```
5. Clone this repository (Ubuntu 14.04/16.04):

    ```
    $ sudo chmod -R 755 /var/www
    
    $ cd /var/www
    
    $ sudo mkdir mvc
    
    $ sudo chown -R user:user mvc // user - it's your username in system
    
    $ git clone git@github.com:svystun/mvc.git mvc // For Windows OS you can start from here:
    
    $ cd mvc
    
    $ composer install
    ```
6. Create virtual host on your local PC (Ubuntu 14.04/16.04). (For Windows OS you can use Openserver or Xampp)
    
    Create config file for virtual host `mvc.dev`:
    ```
    $ sudo nano /etc/apache2/sites-available/mvc.conf
    ```
    Copy and paste this config:
    
    ````
    <VirtualHost *:80>
            ServerName mvc.dev
            ServerAlias www.mvc.dev
            ServerAdmin webmaster@localhost
            DocumentRoot /var/www/mvc/public
    
            <Directory "/var/www/mvc/public">
                    Allowoverride All
            </Directory>
    
            ErrorLog ${APACHE_LOG_DIR}/error.log
            CustomLog ${APACHE_LOG_DIR}/access.log combined
    </VirtualHost>
    ````
    Add host `mvc.dev` to `/etc/hosts`:
    ````
    $ sudo nano /etc/hosts
    ````
    Add this line to the end of file:
    ```
    127.0.0.1  mvc.dev
    ```
    
    Enable `mvc.dev` virtual host:
    ```
    $ sudo a2ensite mvc.conf
    ```
    Enable rewrite mode for server Apache2:
    ````
    $ sudo a2enmod rewrite
    ````
    Restart server Apache2:
    ````
    sudo service apache2 restart
    ````
    
Open browser and go to url: http://mvc.dev