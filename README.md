# GetYourGuide Supplier Api SDK
The GetYourGuide Supplier Api SDK provides the service definition 
that needs to be implemented in order to integrate your products with
the GetYourGuide live reservation services. 

Please find more about using this SDK by reading the README and following 
the example available in the demo folder. 


## Requirements
- PHP 5.5 or later
- GIT
- Optional, composer (https://getcomposer.org/)

## Installation
If you are using composer (recommended), please add the following sources to your composer.json file, this is needed
as our SDK is not published on packagist:
```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/getyourguide/getyourguide-supplier-api-sdk"
    },
    {
        "type": "vcs",
        "url": "https://github.com/getyourguide/thrift-lib"
    },
    {
        "type": "vcs",
        "url": "https://github.com/getyourguide/hhvm-h2tp-resources"
    }
]
```
after that add our package to your require section:
```json
"require": {
    "gyg/getyourguide-supplier-api-sdk": "1.0.*"
}
```
and now, you can simply run ``composer install`` from the root of this project. This will fetch the dependencies and generate the autoload files.

However, using composer is not strictly required. You can also clone the needed repositories 
(dependencies) manually and autoload the files your preferred way.


License
=======
Copyright 2017 GetYourGuide

Licensed to the Apache Software Foundation (ASF) under one
or more contributor license agreements. See the NOTICE file
distributed with this work for additional information
regarding copyright ownership. The ASF licenses this file
to you under the Apache License, Version 2.0 (the
"License"); you may not use this file except in compliance
with the License. You may obtain a copy of the License at

  http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing,
software distributed under the License is distributed on an
"AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY
KIND, either express or implied. See the License for the
specific language governing 


Acknowledgments
===============

The supplier-api files are auto-generated using FBThrift available at

  https://github.com/getyourguide/fbthrift
  
