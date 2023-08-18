# MathCal

The mathematical calendar, which displays math-days.

A Math-day is a day in which its short date format combines itself creating a perfect mathematical condition.

An example is 2/2/04, which  results as a math-day because it can be expressed as 2+2=4, 2*2=4, 2²=4...



## Philosophy

Since I was a kid I like to pay attention to the short date format in order to find any mathematical combinations. Now I tried it but using the help of technology

## Arquitecture

This project uses:
- Laravel (MVC)
- Tailwindcss (UI)

## Development deploy
You can set up a [LEMP](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-ubuntu-18-04) (Linux, Nginx, Myssql, Php) stack (highly recommended, or XAMPP)

Then, with [composer](https://getcomposer.org/), run:
```sh 
composer dump-autoload
composer install
```

If you need a quick deploy (not recommended in a long-term development), you can simply run (with php installed):

```sh
php -S localhost:80 -t public/
```

Else, with a correct LEMP/XAMP folder set up, you souhld be ready to go (remember to point website's root folder to the `public` dir of the project, laravel will do the rest).