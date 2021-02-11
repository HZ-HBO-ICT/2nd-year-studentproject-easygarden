![Logo of the project](https://github.com/GewoonGianni/EasyGarden/blob/master/docs/img/logo_easygarden.png?raw=true)

# Easy Garden

Je eigen groentetuin laten groeien zonder kennis en moeite.

## Installing / Getting started
You will need:
- [XAMPP](https://www.apachefriends.org/index.html)
- [NPM](https://nodejs.org/en/download/)
- [Composer](https://getcomposer.org/)
- [MongoDB with Compass](https://www.mongodb.com/try/download/community)
- [PHP MongoDB DLL](https://github.com/GewoonGianni/EasyGarden/blob/integration/mongodb/docs/dll/php_mongodb.dll)

## Developing

Here's a brief intro about what a developer must do in order to start developing
the project further:

##### First (baby)steps
```shell script
git clone https://github.com/GewoonGianni/EasyGarden

cd EasyGarden/web-app

git checkout development

cp .env.example .env
```
Explanation in text:
1. Clone the repository
2. Change directory to the web-app
3. We work from the development branch. Start using this branch.
4. Copy the .env.example file to .env

##### Installing the MongoDB database with PHP
Follow these steps to install MongoDB properly so that Laravel can work with MongoDB
1. Go to your XAMPP install folder.
2. Put the [PHP MongoDB DLL](https://github.com/GewoonGianni/EasyGarden/blob/integration/mongodb/docs/dll/php_mongodb.dll) inside {xampp_installDir}/php/ext
3. Edit your php.ini file (located in {xampp_installDir}/php/php.ini) and add the following line:
```shell script
extension=php_mongodb.dll
```

4. You can now continue to the next chapter.

##### Installing dependencies + Laravel MongoDB (credit: [Jens Segers - Laravel-MongoDB](https://github.com/jenssegers/Laravel-MongoDB))
1. Run composer install
```shell script
composer install
```
2. Generate a unique key
```shell script
php artisan key:generate
```
3. Run npm install
```shell script
npm install
```

4. You can now continue to the next chapter.

##### Configuring the MongoDB database
To start using database queries use the steps below:
1. Connect and create a database using MongoDB Compass.
2. Change your .env file using the following format:
```shell scriptDB_CONNECTION=mongodb
DB_CONNECTION=mongodb
DB_HOST=localhost
DB_PORT=27017
DB_DATABASE=easygarden
DB_USERNAME=
DB_PASSWORD=
```
3. You do **NOT** have to run ```php artisan migrate:fresh```. Take a look at the TestController.php for a nice example and start using mongodb!


## Features
Some features of this web application:
*   Displays data of a specific plant.
*   Shows TO-DO tasks for the user.
*   Enables the user to plant anything they want with a simple drag and drop system.
*   And more to come!

## Contributing

Make sure to create a model and controller. Seeder and factories are not needed. Example command: `php artisan make:model Test -mc`

This project uses AdminLTE as styling. Make sure to add `@extends('AdminLTE:page')` in your blade views!

## Stay positive!!

![Rage gif](https://media1.tenor.com/images/af98563d72d9a1c1500dc3bbb46a796a/tenor.gif?itemid=7272048)
