﻿# Library Management

Library Management Website using Laravel 8 & MongoDB 4.4

## Live Demo

Link: [library-management-mhkhang.herokuapp.com](http://library-management-mhkhang.herokuapp.com/admin)

![alt text](https://github.com/maikhang/library-management/blob/master/public/asset/img/screenshot.png?raw=true)

## Usage

1.  Clone this repo with CMD:

    `git clone https://github.com/maikhang/library-management.git`

2.  Install packages needed with CMD:

    `cd library-management`

    `composer require`

3.  In repo folder, create file .env:

    MONGO_DB_HOST=127.0.0.1

    MONGO_DB_PORT=27017

    MONGO_DB_DATABASE="your-database-name"

    MONGO_DB_USERNAME=

    MONGO_DB_PASSWORD=

4.  Change database.php in config/database.php:

    Past the code below into 'connections' => [ ]

        	 'mongodb' => [
        		'driver' => 'mongodb',
        		'host' => env('MONGO_DB_HOST', 'localhost'),
        		'port' => env('MONGO_DB_PORT', 27017),
        		'database' => env('MONGO_DB_DATABASE'),
        		'username' => env('MONGO_DB_USERNAME'),
        		'password' => env('MONGO_DB_PASSWORD'),
        		'options' => []
        	],

    Change:
    'default' => env('DB_CONNECTION', 'mysql')

    To:
    'default' => env('DB_CONNECTION', 'mongodb')

5.  Create app key with CMD:

    `php artisan key:generate`

6.  Start MongoDB server
7.  Start Laravel Server with CMD:

    `php artisan serve`

8.  Acess http://127.0.0.1:8000/admin and enjoy !

P/S:

> Make sure you installed PHP > 7.0.0, Composer 2.0, MongoDB 4.4 and MongoDB PHP Driver

Link download:

-   MongoDB: [PHP: Downloads](https://www.php.net/downloads)
-   MongoDB: [MongoDB Community Download | MongoDB](https://www.mongodb.com/try/download/community)
-   MongoDB PHP Driver: [PHP: Installing/Configuring - Manual](https://www.php.net/manual/en/mongodb.setup.php)
-   Composer: [Composer](https://getcomposer.org/download/)
