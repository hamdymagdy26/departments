
## About Departments

- This project is a CRUD application which allows user to (create - read - update - delete).
- Only authenticated users can do the CRUD operation.
- This application uses JWT authetication.

## Setup the application locally 

- git clone the master branch.
- after finishing clone process, create .env file with database credentials of yours.
- run composer install.
- run php artisan migrate
- run php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
- run php artisan jwt:secret
- run php artisan serve.
- you can now start testing the APIs via postman by importing the below collection link -
https://www.getpostman.com/collections/233a526a00f0806a062e

## Testing APIs

- first of all, make sure that your postman header has (Content-Type and Accept) parameters and both of them should have (application/json) value.
- use the Register User to create a new user.
- use the email and password of the user created to login.
- by login, you will have a generated token, kindly add this token as global variable inside the postman environments (Manage Environments -> Globals -> Current Value) .
- feel free to test all the APIs.


