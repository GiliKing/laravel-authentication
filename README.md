# Laravel Basic Authentication

Basic authentication with laravel

# live view

You can check the live view at

http://astract-project.herokuapp.com/

for user registration : http://astract-project.herokuapp.com/registration

for user login : http://astract-project.herokuapp.com/login

for admin login: http://astract-project.herokuapp.com/admin/login

# Image View

![Alt text](/public/Capture.PNG "Laravel Auth")

## Usage

### Database Setup
This app uses MySQL. To use something different, open up config/Database.php and change the default driver.

To use MySQL, make sure you install it, setup a database and then add your db credentials(database, username and password) to the .env.example file and rename it to .env

### Migrations
To create all the nessesary tables and columns, run the following
```
php artisan migrate
```

### Seeding The Database
To add the dummy listings with a single user, run the following
```
php artisan db:seed
```

### Running Then App
Upload the files to your document root, Valet folder or run 
```
php artisan serve
```

## License

The LaraGigs app is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).