LaraChat
========================

Aplicación web de chat sencillo creado con el framework [Laravel](https://laravel.com/) para probar uso de websockets con [Pusher](https://pusher.com/) y [Laravel Echo](https://laravel.com/docs/5.5/broadcasting).

Instalación
--------------

Clona el repositorio

    git clone https://github.com/Rea97/lara-chat.git

Posicionate dentro de la carpeta del proyecto

    cd lara-chat
    
Crea un archivo .env, puedes usar el que viene de ejemplo y después configura tus variables de entorno

    cp .env.example .env

Instala las dependencias con composer

	composer install

Ejecuta las migraciones

    php artisan migrate
    
Crea una cuenta gratuita en [Pusher](https://pusher.com/), luego una aplicación y dentro del archivo .env agrega
las credenciales que provee pusher
```text
PUSHER_APP_ID=id-de-tu-app
PUSHER_APP_KEY=key-de-tu-app
PUSHER_APP_SECRET=secret-de-tu-app
PUSHER_APP_CLUSTER=cluster-que-seleccionaste
```

Establece el driver de queues en database y ejecuta el queue worker

    php artisan queue:work

Inicia el servidor local

    php artisan serve
    