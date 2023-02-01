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
Capturas
Poost
![image](https://user-images.githubusercontent.com/95943858/216057988-574a7b20-b118-4b3e-b680-53e96440e1eb.png)
Tags
![image](https://user-images.githubusercontent.com/95943858/216058045-b28e8e26-3333-4ed3-a081-2af9c026c342.png)
Categorias 
![image](https://user-images.githubusercontent.com/95943858/216058091-221d54e7-dc07-4fc0-9434-857b43108758.png)

Roles y permisos
![image](https://user-images.githubusercontent.com/95943858/216058147-d694072e-8506-420d-9b1f-ba554c624584.png)

usuarios
![image](https://user-images.githubusercontent.com/95943858/216058527-377cca3d-aa1a-49c9-8d3a-da7b6748a7e8.png)

Home dashboard
![image](https://user-images.githubusercontent.com/95943858/216058609-f621c174-082e-46e5-a0b3-42b4bb4adbe6.png)


home sin inicio de session
![image](https://user-images.githubusercontent.com/95943858/216056260-5c103cfc-a911-4075-bee6-fb1c9c44580a.png)

home con inicio de session
![image](https://user-images.githubusercontent.com/95943858/216058726-fb48bfd0-b9a3-4af6-b678-462548e970f1.png)

