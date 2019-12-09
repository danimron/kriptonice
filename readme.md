# A simple blog website with an encryption 

## Requirements

- Laravel 5.8
- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension

## Installation

git clone <git> blog
cd blog
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed


## Thanks to 

- [Nuruzzaman Milon](https://milon.im)
https://github.com/milon/laravel-blog.git

- N40TR1X
https://github.com/naufaltrix/Transposition-Cipher-With-Php-Language.git
