Instalacion del proyecto
se necesita php y msql corriendo en cualquier paquete como xampp , wamp , laragon

git clone https://github.com/ROLY2033/blogger-laravel.git

para los errores habilitar del php.ini
```sh
extension=openssl
extension=fileinfo
extension=gd
```
instalar composer e cambiar el .env-example a .env
```sh
composer install
```

```sh
composer update --ignore-platform-req=ext-fileinfo~
```

para cuando compila el codigo codigo laravel

```sh 
php artisan migrate --seed
php artisan serve
```

correr el codigo
```sh
npm install
npm run dev
```

