# Proyecto_Final_PWII
Proyecto final de programación web II, Sistema de Gestión de Reservas

# Club Meta - Sistema de Gestión de Club Recreativo

## Descripción
Club Meta es un sistema web full-stack para la gestión de un club recreativo. Incluye funcionalidades de autenticación de usuarios, alquiler de espacios con descuentos para socios, y un panel de administración para aprobar reservas y editar precios. El backend está desarrollado en Laravel (PHP) y el frontend en Angular (TypeScript).

### Características Principales
- **Autenticación**: Registro y login de usuarios, con detección automática de socios (contraseña terminando en "B").
- **Interfaz Responsiva**: Diseño moderno y adaptable a móviles/tablets.
- **Base de Datos**: MySQL con tablas para usuarios, espacios y reservas.

## Requisitos Previos
Antes de instalar, asegúrate de tener instalados:
- **PHP** >= 8.1 (con extensiones: pdo, mbstring, openssl, etc.)
- **Composer** (para dependencias de PHP)
- **Node.js** >= 18 y **npm** (para Angular)
- **MySQL** o **MariaDB** (para la base de datos)
- **Git** (para clonar el repositorio)
- **XAMPP** o similar (opcional, para servidor local con Apache/MySQL)

## Instalación

### 1. Clonar el Repositorio

https://github.com/jb-hub-code/Proyecto_Final_PWII.git
cd club-meta

2. Backend (Laravel)
Navega a la carpeta del backend:


Copy code
cd backend
Instala dependencias de PHP:



Copy code
composer install
Copia el archivo de configuración de entorno:



Copy code
cp .env.example .env
Configura el archivo .env:

Edita las variables de base de datos:

Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=club_meta
DB_USERNAME=tu_usuario_mysql
DB_PASSWORD=tu_contraseña_mysql



Copy code
php artisan key:generate
Ejecuta las migraciones y seeders para poblar la base de datos:



Copy code
php artisan migrate
php artisan db:seed --class=EspaciosSeeder
3. Frontend (Angular)
Navega a la carpeta del frontend:



Copy code
cd ../frontend
Instala dependencias de Node.js:



Copy code
npm install
Configura el archivo src/environments/environment.ts (si es necesario) para apuntar a la API de Laravel:


4 lines
Copy code
Download code
Click to expand
export const environment = {
production: false,
...
Configuración Adicional
Base de Datos: Crea una base de datos llamada club_meta en phpMyAdmin o MySQL. Asegúrate de que las credenciales en .env coincidan.
CORS en Laravel: Si hay problemas de origen cruzado, instala y configura Laravel Sanctum:
bash


composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
Permisos: Asegúrate de que las carpetas storage y bootstrap/cache en Laravel tengan permisos de escritura.
Ejecución
Backend:




cd backend
php artisan serve
Accede a http://127.0.0.1:8000 para verificar que Laravel esté corriendo.
Frontend:


cd frontend
ng serve --open
