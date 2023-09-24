Steps to run the application in the localhost:
Download composer https://getcomposer.org/download/
Pull Laravel/ project from this repository
Open the console and cd to the project root directory
Run `composer install` or `php composer.phar install`
Run `php artisan key:generate`
Run `php artisan migrate`
Run `php artisan db:seed` to run seeders, if any.
Run `php artisan serve`
