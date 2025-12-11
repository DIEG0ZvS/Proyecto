<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<<<<<<< HEAD
## About Laravel
=======
<!-- ## About Laravel
>>>>>>> diego

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

<<<<<<< HEAD
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
=======
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->


# Plataforma de Citas Médicas para Zonas Rurales

Proyecto desarrollado en Laravel 12 con roles y autenticación para gestionar pacientes, médicos, centros de salud y administradores.

## 1. Descripción del proyecto

Este sistema permite la gestión de citas médicas en zonas rurales mediante una plataforma web accesible para diferentes tipos de usuarios.

El proyecto incluye:

- Sistema de autenticación (Login / Register) usando Laravel UI

- Roles de usuario: paciente, médico, centro de salud, administrador

- Navegación dinámica según el rol

- Formularios y vistas sin conexión real a BD todavía

- Branding con paleta verde suave

- Estructura base para implementaciones futuras

## 2. Tecnologías utilizadas

- Laravel 12

- Laravel/UI (Bootstrap + Auth)

- PHP 8.3

- MySQL (Laragon)

- Bootstrap 5

- Vite (JS + SCSS)

- Blade Templates

## 3. Instalación del proyecto
### 3.1 Clonar repositorio

git clone https://github.com/yorbiiii/citas-medicas-rurales.git
cd citas-medicas-rurales

### 3.2 Instalar dependencias de PHP
composer install

### 3.3 Instalar dependencias de Node
npm install

### 3.4 Crear archivo .env
cp .env.example .env


Configurar la base de datos:

- DB_DATABASE=citas_medicas_rurales
- DB_USERNAME=root
- DB_PASSWORD=

### 3.5 Generar llave del proyecto
php artisan key:generate

### 3.6 Ejecutar migraciones
php artisan migrate

### 3.7 Compilar estilos
npm run dev

### 3.8 Iniciar servidor Laravel
php artisan serve


La aplicación estará disponible en:

http://127.0.0.1:8000

## 4. Roles del sistema

- Paciente

- Médico

- Centro de Salud

- Administrador

Cada rol tiene su propio panel:

| Paciente                                       | /paciente |
|------------------------------------------------|-----------|
| Medico                                         |  /medico  |
|------------------------------------------------|-----------|
| Centro                                         |  /centro  |
|------------------------------------------------|-----------|
| Admin                                          |  /admin   |



## 5. Navegación según tipo de usuario

Implementado en layouts/app.blade.php.

### Menú visible según el rol:

- **Paciente**
  - Mis citas
  - Buscar médicos

- **Médico**
  - Agenda de hoy
  - Mis pacientes

- **Centro**
  - Panel del centro

- **Admin**
  - Panel admin

## 6. Branding inicial (colores)

Aplicado a:

Navbar

Login

Register

Dashboard de cada rol

### Paleta usada

| Elemento        | Color         |        Código      |
|-----------------|---------------|--------------------|
| Verde principal | #96A78D     | rgb(150,167,141) |
| Verde pastel    | #B6CEB4     | rgb(182,206,180) |
| Verde claro     | #D9E9CF     | rgb(217,233,207) |
| Fondo claro     | #FFFFFF     | rgb(255,255,255) |


## 7. Estado actual del avance (según el docente)
### Requisitos solicitados

| Requisito                                      | Estado |
|------------------------------------------------|--------|
| Autenticación Laravel/UI                       |  Hecho |
| Vistas sin BD (solo formularios / tablas)      |  Hecho |
| Navegación por tipo de usuario                 |  Hecho |
| Roles y redirecciones                          |  Hecho |
| Branding inicial                               |  Hecho |
| Subido a GitHub                                |  Hecho |


## 8. Integrantes del proyecto (editar)

Durand Clemente Yohorbi

Mendoza Ospino Yuleymir

Zevallos Salas Diego

## 9. Licencia

Proyecto académico desarrollado para fines educativos – Universidad de Huánuco (UDH).
>>>>>>> diego
