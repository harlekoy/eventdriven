# Bet Prophet

This is a Laravel and Vue.JS based web application.

## Installation

## How to run API

1.) Clone the project locally (`git clone git@github.com:betprophet1/app.git`)

2.) Open `terminal` or `command prompt`

3.) `cd` to project

4.) Run `git clone git@github.com:betprophet1/betradar.git ../betradar`

5.) Run `git clone git@github.com:betprophet1/apidocs.git ../apidocs`

6.) Run `git apply patch.diff`

7.) Run `composer install`

8.) Run `cp .env.example .env` to create the projects environment file

9.) Run `php artisan key:generate`

10.) Run `php artisan migrate --seed`

11.) Run `php artisan serve`


## How to run Web App

1.) Go to project directory

2.) `cd` to `frontend/`

3.) Run `npm install` or `yarn`

4.) Run `npm run serve` or `yarn serve`

## App URL paths

- App Login `prophet.test/login`
- App API `prophet.test/api/*`
- Admin Login `prophet.test/admin/login`
- Admin API `prophet.test/nova-api/*`
- App debugger `prophet.test/debugger`
- App queue management tool `prophet.test/horizon` (need auth from admin tool)
- Task scheduler management tool `prophet.test/totem` (need auth from admin tool)

## Additional Information

Here is the [Postman](https://www.getpostman.com/collections/9d43ee6cdba7ee7064c0) routes to test the API.
Note: Make sure the Laravel instance is running.
