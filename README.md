# Short urls

HTTP API service to get location by IP


## Getting Started


### Installing

* Clone project from repository
```
git clone git@github.com:Kapral87/geo_ip.git
```
Or download zip archive

* Copy .env.example to .env and set variables
```
DB_DATABASE={db_name}
DB_USERNAME={user_name}
DB_PASSWORD={user_password}
```

* Execute commands to install and update dependencies
```
composer install
composer update
```

* Migrate database structure
```
php artisan migrate
```

* Fill database with data
```
php artisan db:seed
```

### Executing program

* Send GET request to API endpoint {current_project_domain}/geo2ip?ip={ip} to get location of IP

Required GET params
ip - ip for which we want to know the location. Example {current_project_domain}/geo2ip?ip=176.116.138.182


* Success response

```
{"data":{"latitude":54.33333,"longitude":48.4,"country_name":"Russian Federation","city_name":"Ulyanovsk"}}
```

* Error response

```
{"errors":{"ip":["The ip field is required."]}}
```

errors - array of errors, where key is field and value is array of error messages for that field

* No IP response

If there is no such ip in DB as in request, than error 404 will be returned

### Comments

Filling database by IPs data could take several minutes