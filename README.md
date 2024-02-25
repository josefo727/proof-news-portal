# Laravel Project README

## Overview

Este proyecto Laravel fue desarrollado como parte de una prueba de ingreso para el cargo de FullStack Developer, enfocándose en el uso de Laravel y el stack TALL (Tailwind CSS, Alpine.js, Laravel, Livewire). Se diseñó para proporcionar una solución robusta y escalable para un portal de noticias, implementando funcionalidades clave como autenticación, gestión de artículos y categorías, y adaptadores para integraciones externas. A través del seguimiento de los principios SOLID y la aplicación de diversos patrones de diseño, el código busca ser limpio, mantenible y extensible, demostrando las capacidades del desarrollador en la construcción de aplicaciones web complejas y eficientes.

## Levantar el Proyecto

### Requisitos Previos

- Docker
o
- PHP + Composer

### Pasos para la Instalación

1. *Clonar el Repositorio*:
    - SSH
    ```
    git clone git@github.com:josefo727/proof-news-portal.git
    ```
    - HTTPS
    ```
    git clone https://github.com/josefo727/proof-news-portal.git
    ```

2. *Configurar .env*:
    Copiar `.env.example` a `.env` y configurar las variables de entorno.
    ```
    cp .env.example .env
    ```

3. *Instalar Dependencias*:

    - Con Docker
        ```
        docker run --rm \
            -u "$(id -u):$(id -g)" \
            -v "$(pwd):/var/www/html" \
            -w /var/www/html \
            laravelsail/php83-composer:latest \
            composer install --ignore-platform-reqs
        ```
    - Con PHP + Composer
        ```
        composer install
        ```

4. *Levantar con Laravel Sail*:
    - Con Docker (Laravel Sail)
        ```
        ./vendor/bin/sail up -d --remove-orphans
        ```
    - Con PHP
        ```
        php artisan serve
        ```

5. *Correr Migraciones y Seeders*:
    - Con Docker (Laravel Sail)
        ```
        ./vendor/bin/sail artisan migrate:fresh --seed
        ```
    - Con PHP
        ```
        php artisan migrate:fresh --seed
        ```

## Adaptadores, Servicios y Traits

### Adaptadores

- *NewsApiAdapter*: Integra la API de noticias externas.
- *RandomUserAdapter*: Integra la API RandomUser para la generación de autores.

### Servicios

- *NewsApiService*: Encapsula la lógica de consumo y procesamiento de noticias.
- *UserService*: Gestiona operaciones relacionadas con los autores.

### Traits

- *HasUniqueSlug*: Asegura que los slugs sean únicos.
- *HasAuthor*: Asigna automáticamente el autor a un artículo.

### Principios SOLID y Patrones de Diseño

- *Principio de Responsabilidad Única*: Cada clase tiene una sola responsabilidad.
- *Principio de Abierto/Cerrado*: Las clases están abiertas para extensión pero cerradas para modificación.
- *Patrón Adapter*: Los adaptadores permiten la interacción con APIs externas sin modificar el código interno.
- *Clean Code*: El uso de traits y servicios promueve un código limpio y reutilizable.

## Paquetes Instalados

- *spatie/laravel-permission*: Gestión de roles y permisos.
- *laravel/sail*: Facilita el manejo del entorno de desarrollo con Docker.

## Tests

El proyecto incluye pruebas unitarias y de integración para validar las funcionalidades clave. Para ejecutar las pruebas:
    ```
    ./vendor/bin/sail test
    ```

![Batería de Tests](/public/tests.png)
