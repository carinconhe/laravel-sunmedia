# laravel-sunmedia
Este repositorio es usado para el maneja de pautas:

- PHP version 7.2.20
- Laravel 6.*

####Se realizaron los siguientes modulos:

- Type Components -> este es un modulo para la administración de tipos de componentes. 
    + Text 
    + Video
    + Image
- Components -> este es un modulo para la administración de componentes.
- Adverts -> este es un modulo para la administración de pautas.

###Configuración

Una vez se descarga el proyecto de git, es importante tener instalado composer para realizar la instalación

`$ composer install`

`php artisan key:generate`

El Archivo de .env tiene la siguiente estructura 


```bash
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:z8rxWRqQ8TgVXuksRi9Kbb4yjoH5gFFrzGhkAofTWn8=
APP_DEBUG=true
APP_URL=http://test-skeleton.test

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sunmedia
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"

SCOUT_DRIVER=null

FILESYSTEM_DRIVER =public

```

`php artisan migrate`

`php artisan storage:link`


 Luego correr el siguiente script sobre la base de datos

 ```sql
INSERT INTO `type_components` (`id`, `name`, `status`, `created_at`, `updated_at`)
VALUES
	(1, 'Text', 1, NULL, '2019-11-11 03:39:50'),
	(2, 'Video', 1, NULL, NULL),
	(3, 'Image', 1, NULL, NULL);
```
###Links

Ejecutar sobre el navegador. Mi http://localhost es http://test-skeleton.test

    Registro.
    http://test-skeleton.test/register

    Login
    http://test-skeleton.test/login

    Dashboard
    http://test-skeleton.test/home


