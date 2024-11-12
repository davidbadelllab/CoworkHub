# CoworkHub - Sistema de Reserva de Salas

CoworkHub es un sistema diseñado para facilitar la gestión y reserva de salas en entornos de coworking y oficinas compartidas. Permite a los usuarios verificar la disponibilidad de salas, realizar reservas en tiempo real, y gestionar las reservas con facilidad desde cualquier dispositivo.

## 🚀 Comenzando

Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas.

### 📋 Pre-requisitos

Qué cosas necesitas para instalar el software:

- [Composer](https://getcomposer.org/)
- PHP >= 8.1
- Un servidor de bases de datos (MySQL, PostgreSQL, SQLite, etc.)

### 🔧 Instalación

Sigue estos pasos para configurar tu entorno de desarrollo local:

1. **Clonar el repositorio**

   ```bash
   git clone https://github.com/tu-usuario/coworkhub.git
   cd coworkhub
   Instalar dependencias de PHP con Composer
   ```

Opciones de instalacion oc corrida del sistema

1. Instalar Composer

composer install

2. Luego, genera la clave de la aplicación:

php artisan key:generate

3. Ejecutar migraciones

php artisan migrate

4. Ejecutar Seeders

php artisan db:seed

📦 Desarrollo
Explica cómo ejecutar las pruebas automatizadas para este sistema.

🛠️ Construido con

Laravel - El framework web usado
Bootstrap - Framework de CSS
MySql
