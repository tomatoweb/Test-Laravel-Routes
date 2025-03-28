## Test Laravel Routing

This repository is a test: fill in `routes/web.php` and `routes/api.php`.

Example:

```
// Task 2: point the GET URL "/user/[name]" to the UserController method "show"
// It doesn't use Route Model Binding, it expects $name as a parameter
// Put one code line here below
```

To test if all the routes work correctly, there are PHPUnit tests in `tests/Feature/RoutesTest.php` file.


---


DB:
--

Copy the contents of your .env or .env.example file to create a file called .env.testing

Change the value of APP_ENV to 'testing'

remove all of the DB_ entries

Make sure your phpunit.xml has the following lines and uncomment them:

<env name="DB_CONNECTION" value="memory_testing"/>
<env name="DB_DATABASE" value=":memory:"/>

Add the following array to your connections in database.php:

'connections' => [

   'memory_testing' => [
     'driver' => 'sqlite',
     'database' => ':memory:',
     'prefix' => '',
   ],

   ...
Finally, run 
	php artisan optimize:clear
 to clear the caches.

Your unit and feature tests should now be using the in-memory SQLite database, 
while your local should continue using the database configured in .env file.



APP KEY:
--------

php artisan key:generate --env=testing



MySQL error key too long:
------------------------

Solution 1:

In file appServiceProvider.php in function boot() ->   Schema::defaultStringLength(191);

Solution 2:

Inside config/database.php, replace this line for mysql

'engine' => null',

with

'engine' => 'InnoDB ROW_FORMAT=DYNAMIC',


Then retry    php artisan migrate:fresh

