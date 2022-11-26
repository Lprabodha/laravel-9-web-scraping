
## Laravel 9 web scraping

Roach PHP is a complete web scraping toolkit for PHP. Not only does it handle the crawling of web content, but it also provides an entire pipeline to process scraped data, making it an all-in-one resource for scraping web pages with PHP.

https://roach-php.dev/docs/introduction/
https://github.com/roach-php/core

Instead of installing the core Roach package, we are going to install Roach’s Laravel adapter.

```
composer require roach-php/laravel
```
We can also publish the configuration file that comes with the package.

```
php artisan vendor:publish --provider='RoachPHP\Laravel\RoachServiceProvider'
```
This will publish a roach.php configuration file to our app’s config folder.

![Screenshot 2022-11-26 111342](https://user-images.githubusercontent.com/67253461/204074364-54b663f7-eb24-4469-8846-d3acd6fa29ea.png)
