Instalacion del proyecto
se necesita php y msql corriendo en cualquier paquete como xampp , wamp , laragon

git clone https://github.com/ROLY2033/blogger-laravel.git[dill]
para los errores habilitar del php.ini
```sh
extension=openssl
extension=fileinfo
extension=gd
```

```sh
composer update --ignore-platform-req=ext-fileinfo~
```

para cuando compila el codigo codigo laravel

```sh 
php artinsan migrate --seed
php artisan serve
```

correr el codigo
```sh
npm install
npm run dev
```

