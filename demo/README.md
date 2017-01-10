# How to get going

## Requirements
- PHP 5.5 or later
- GIT
- Optional, composer (https://getcomposer.org/)

## Installation
If you are using composer (recommended) you can simply run ``composer install`` from within this directory. It will
fetch fetch the dependencies and generate the autoload file for you. 

Composer is not strictly required. You can also clone the needed repositories (dependencies) manually and autoload 
the files your preferred way (as well as replace the autoloader require statement in the demo files).

## Play

### Server
Open a terminal and navigate to the folder where this file resides in. You start the server as follows:
``
php -S localhost:8080 demo-server.php 
``

### Client

Open a terminal and navigate to the folder where this file resides in. You can run the client demos as follows:
``
php client-demos.php 
``

## Implementation

You will essentially need to write some service/handler classes doing the heavy lifting. The wiring of your real
implementation can be started off by basing it on the above examples.
