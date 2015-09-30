# Laravel real time chat
Example of real time chat application basen on Laravel, React, Reflux and Socket.IO. 
Main JS app code is in resources/app/js

## Installation
Install global webpack and gulp
```sh
$ npm install -g gulp webpack
```
Install dependencies
```sh
$ composer install
$ npm install
```
Build assets
```sh
$ gulp && webpack
```
Install DB
```sh
$ php artisan migrate
```

## Usage
Start laravel queue listener
```sh
$ php artisan queue:listen
```
Start node.js socket server
```sh
$ node ./server.js
```
Enjoy!
