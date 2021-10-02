# Laravel Test

## Task

Your task is to create a table of data retrieved from the following API: [https://age-of-empires-2-api.herokuapp.com/docs/](https://age-of-empires-2-api.herokuapp.com/docs/).

The home page of the project should display a paginated table of the "Units" (using the `/units` endpoint), with the option of selecting to show either 10, 20 or 50 at a time. In the table include the following columns: `name`, `hit_points`, `attack` & `build_time` as well as the ability to sort by these fields.

Please note it's not expected that the table sort on the front-end, but rather reloads with page.

As well as the main table of units, create a second route to display additional information for a unit when selected (using the `/unit/{id}` endpoint). What data is displayed on this page is up to you.

## Instructions

Please review these carefully, both the final submitted code & how well these instructions are followed will be taken into consideration.

* Clone this repository, then create your own public repository and set that as the remote (see: `git remote set-url`). This is so that other's can't see your work as they would if you were to fork the repository.
* Create a pull request to the `main` branch of your repository with your solution.
* Don't worry about styling, though if you'd like to you can use Bootstrap.
* Using [Single Action Controllers](https://laravel.com/docs/8.x/controllers#single-action-controllers) and named routes is preferred.
* Include some validation for parameters such as the sort and items-per-page limit.
* Include some caching for API requests.
* Give yourself approx. 2 hours to complete the task.

## Project setup

```
composer install
php artisan serve
npm i
npm run dev
```
