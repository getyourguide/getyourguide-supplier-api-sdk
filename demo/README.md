# Getting Started

## Requirements
- PHP 5.5 or later
- GIT
- Optional, composer (https://getcomposer.org/)

## Installation
If you are using composer (recommended) you can simply run ``composer install`` from 
within this directory. This will fetch the dependencies and generate the autoload files. 

However, using composer is not strictly required. You can also clone the needed repositories 
(dependencies) manually and autoload the files your preferred way 
(as well as replace the autoloader require statement in the demo files).

## Usage

### Server
Open a terminal and navigate to the folder where this file resides in. 
You can then start the demo server as follows:

``
php -S localhost:8080 demo-server.php 
``

### Client

Open a terminal and navigate to the folder where this file resides in. 
You can run the client demos as follows:

``
php client-demos.php 
``

## Implementation

You will be required to write service/handler classes doing the heavy lifting or mappings 
within your existing services. The provided examples should provide a good starting point on which your 
real implementation can be based.
