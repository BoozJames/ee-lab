<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>


## About Laravel

Laravel is a web framework known for its elegant syntax, making development enjoyable. It simplifies common web tasks, making it accessible and powerful for large projects. With extensive documentation and Laracasts' video tutorials, learning Laravel is straightforward, whether through the Laravel Bootcamp or Laracasts' comprehensive library, covering Laravel, PHP, unit testing, and JavaScript.


## How to Setup   
For setting up the Laravel Admin Dashboard, you need to follow these steps:     

Clone the Laravel framework from GitHub.        
Install dependencies using Composer: composer install.      
Create a new .env file and add the following information:       
`cp .env-example .env`    
APP_NAME=Laravel Admin Dashboard    
APP_ENV=local   
APP_KEY=your_app_key    
APP_DEBUG=true  
APP_URL=http://localhost    

SYS_USERNAME=your_super_admin_username or employee code  
SYS_PASSWORD=your_super_admin_password  
SYS_EMAIL=your_super_admin_email    
SYS_ROLE=0  

Replace your_app_key, your_super_admin_username, your_super_admin_password, your_super_admin_email with appropriate values.

Generate a new application key: `php artisan key:generate`.   
Run migrations to create necessary database tables: `php artisan migrate`.  
(Optional) You may also use the custom command of `php artisan refresh:db` which does the db:wipe, migrate, and db:seed   

Serve the application: php artisan serve.  

Now, you should have your Laravel Admin Dashboard set up with the provided environment variables in the .env file.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
