# Consultas Básicas de Tablas Relacionadas

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Logo de Laravel"></a></p>

## Estructura

- **Modelos**: El modelo `Owner` está definido en [`app/Models`](app/Models) y es central para la aplicación, representando los datos que manipularemos.

- **Migraciones**: La estructura de la base de datos se define a través de migraciones ubicadas en [`database/migrations`](database/migrations). Estos archivos definen el esquema de la tabla `owners`.

- **Seeders**: Los datos iniciales para la tabla `owners` se encuentran en [`database/seeders`](database/seeders), permitiendo una fácil población de datos de prueba.

- **Rutas**: Los endpoints API relacionados con las operaciones de `Owner` están definidos en [`routes/api.php`](routes/api.php).

## Características

- **Operaciones de Consulta**: Las operaciones de Consulta Están en el  `OwnerController` ubicado en [`App\Http\Controllers\OwnerController.php`](app/Http/Controllers/OwnerController.php).

## Empezando

Para comenzar con este ejemplo, clona el repositorio e instala las dependencias:

```bash
composer install
```

Luego, ejecuta las migraciones y los seeders para configurar tu base de datos:

```bash
php artisan migrate --seed
```

Finalmente, sirve la aplicación:

```bash
php artisan serve
```

## Rutas

#### Consultar todos los Owners
```bash
http://localhost:8000/api/owners
```

#### Consultar por identificación
Siendo el numero 12 un ejemplo de busqueda por identificación
```bash
http://localhost:8000/api/owners/12/byNumber
```

#### Consultar por Nombre
Siendo el las letras sa un ejemplo de busqueda por nombre
```bash
http://localhost:8000/api/owners/sa/byName
```
