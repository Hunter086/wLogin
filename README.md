1 Requisitos previos:
Asegúrate de tener instalados PHP, Composer y Symfony en tu PC. Puedes instalar Symfony utilizando el instalador de Symfony o a través de Composer.

2 Clonar el Repositorio:
Clona el repositorio del proyecto desde el repositorio remoto utilizando Git.
git clone <URL_del_repositorio>

3 Instalar Dependencias:
Navega al directorio del proyecto y ejecuta el siguiente comando para instalar las dependencias del proyecto.

4 Configuración del Entorno:
Copia el archivo .env y configura las variables de entorno necesarias, como la conexión a la base de datos y las credenciales de Google Sign-In.
cp .env.dist .env

5 Crear la Base de Datos:
Si tu proyecto utiliza una base de datos, crea la base de datos y ejecuta las migraciones.
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

6 Configuración de Google Sign-In:
Obtén las credenciales de OAuth 2.0 para Google Sign-In desde el Google Developer Console, y configura las credenciales en tu aplicación Symfony.

7 Ejecutar el Servidor de Desarrollo:
Inicia el servidor de desarrollo de Symfony.
symfony server:start
ó
npm run serve
