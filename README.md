
## About Departments

- This project is a CRUD application which allows user to (create - read - update - delete).
- Only authenticated users can do the CRUD operation.
- This application uses JWT authetication.

## Setup the application locally 

- git clone the branch master.
- after finishing clone process, create .env file with database credentials of yours.
- run composer install.
- run php artisan migrate
- run php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
- run php artisan jwt:secret
- run php artisan serve.
- you can now start testing the APIs via postman by importing the below collection link -
https://www.getpostman.com/collections/47b28de6af6a2fc598ed

## Testing APIs

- first of all, make sure that your postman header has (Content-Type and Accept) parameter and both of them should have (application/json)
- use the Register User to create a new user.
- use the email and password of the user created to login.
- by login, you will have token, kindly use this token as a Bearer token in all upcoming requests by adding it to the Authorization tab inside (Bearer Token) of each request.


