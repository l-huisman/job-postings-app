<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Pixel Positions

Pixel Positions is a platform where employers can post job openings to find potential employees.

## Built with Laravel

This application was built using Laravel 12 and was inspired by the "30 Days to Learn Laravel 11" course on Laracasts: [https://laracasts.com/series/30-days-to-learn-laravel-11](https://laracasts.com/series/30-days-to-learn-laravel-11).

## Features

*   Employers can create profiles and post job listings.
*   Job seekers can search for jobs.

## Technologies Used

*   **Laravel 12.20.0**
*   **PHP 8.4.6**

## Setup

1.  Clone the repository.
2.  Run `composer install` to install dependencies.
3.  Configure your database in the `.env` file.
4.  Run `php artisan migrate:fresh --seed` to create the database tables and seed it with dummy data.
5.  Run `php artisan serve` to start the development server.
6.  Run `npm run dev` to start the js development server.

## Additional Information

This application was developed with the Herd application running in the background. Making a dummy webserver available so the application can be reached via http://pixel-positions.test
