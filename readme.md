# Test NetForemost

## Instalación

Se deben instalar las dependencias como se haría normalmente en un proyecto para cada uno de sus entornos.

> **PHP 8.4**
>
> **BACKEND**
>
> ```bash
> composer install
> ```

> **NodeJs 20.10**
>
> **FRONTEND**
>
> ```bash
> npm install
> ```

> Tambien se debe de crear una copia del archivo **.env.example** del backend y renombrarlo a **.env**

## Ejecución

### Backend

Para inicializar el backend se recomienda usar Docker junto con [Laravel Sail](https://laravel.com/docs/11.x/sail). Se trabajó de este modo para tener un entorno de desarrollo aislado.

El comando para inicializar el proyecto es:

```bash
./vendor/bin/sail up -d
```

Si no se tiene Docker instalado, se puede ejecutar como un proyecto de desarrollo de Laravel.

```bash
php artisan serve --port=80
```

### Frontend

Es necesario tener instalado el [Angular CLI](https://angular.dev/tools/cli) para poder ejecutar el siguiente comando:

```bash
ng serve
```

> El frontend por defecto espera al backend en el puerto 80, esto se puede cambiar en el archivo **api.service.ts**.

### Montaje Base de Datos

Para el montaje de la BD se recomienda utilizar el siguiente comando.

> ```bash
> ./vendor/bin/sail artisan migrate:refresh --seed
> ```

> Actualizar los valores del .env si se utilizara de manera nativa del sistema.

## Ejercicio #1: Importación de datos

### Duración: 4 horas y 40 minutos

### Observaciones

- El dato de cocina equipada se repetía en "Cocina equipada" y "Cocina Equipada".
- El campo "Calefacción individual" posee campos de texto y booleanos; se reemplaza TRUE por SÍ.
- Algunos campos en vez de devolver "FALSE" devuelven texto vacío, se reemplaza por un "false" booleano.
- El campo fecha viene con formato incorrecto en algunos casos. Por ejemplo: 2019/0/meses, se dejará como NULL.

### Análisis

Se separará la información del CSV en la siguiente estructura:

#### Accommodation - (Alojamiento)

El campo "ID" se guarda como "original_id", esto para poder referenciarlo de ser necesario y no perder la secuencia de la tabla.

- `original_id` - ID
- `title` - Título
- `advertiser` - Anunciante
- `description` - Descripción
- `phones` - Teléfonos
- `type` - Tipo
- `price` - Precio
- `meters` - Metros cuadrados
- `meter_price` - Precio por metro
- `useful_meters` - Metros cuadrados útiles
- `register_at` - Fecha
- `built_in` - Construido en

#### AccommodationLocation - (Localización del Alojamiento)

- `latitude` - Latitud
- `longitude` - Longitud
- `address` - Dirección
- `province` - Provincia
- `city` - Ciudad
- `street` - Calle
- `neighborhood` - Barrio
- `district` - Distrito

#### AccommodationDetail - (Detalles del Alojamiento)

- `reformed` - Reformado
- `bedrooms` - Habitaciones
- `bathrooms` - Baños
- `parking` - Parking
- `second_hand` - Segunda mano
- `built_in_wardrobes` - Armarios Empotrados
- `furnished` - Amueblado
- `floor` - Planta
- `exterior` - Exterior
- `interior` - Interior
- `elevator` - Ascensor
- `terrace` - Terraza
- `storage_room` - Trastero
- `pool` - Piscina
- `garden` - Jardín
- `balcony` - Balcón
- `individual_heating` - Calefacción individual
- `energetic_certification` - Certificación energética
- `equipped_kitchen` - Cocina Equipada
- `air_conditioning` - Aire acondicionado
- `suitable_mobility` - Apto para personas con movilidad reducida
- `plants` - Plantas
- `pets_allowed` - Se admiten mascotas

## Ejercicio #2

### Duración: 8 horas

Durante este período, se comenzó por crear la interfaz gráfica para el acceso al usuario. La interfaz le permite al usuario filtrar la información y también paginarla para una fácil lectura.

Para el filtrado de la información se creó un patrón Builder que genera la consulta necesaria de manera dinámica tomando en cuenta los parámetros ingresados. Entre otros patrones o capas, cabe mencionar la capa de Repository, donde se generan las consultas, y la de servicios, que ayuda a separar la lógica de negocio.

Del lado de la interfaz gráfica, se instaló el módulo de Bootstrap y Bootswatch para poder customizar Bootstrap de manera rápida con un tema ya definido.

Los filtros solicitados fueron:

- Rango de precios (Menor, mayor)
- Cantidad de Habitaciones

El paso que tomó más tiempo fue el desarrollo de la interfaz de usuario.

## Ejercicio #3

### Duración: 2 horas

Se inició con una etapa de investigación, ya que no se conocía cómo realizar la tarea. Investigando en internet encontré información sobre la [Fórmula de Haversine](https://es.scribd.com/presentation/675358086/Ley-de-Haversine).

Una vez comprendido cómo funciona, se procedió a realizar pruebas y a implementar en el patrón Builder de los filtros. Esto permitió no solo obtener el promedio del valor de los alojamientos en esa zona, sino también poder filtrar y mostrar por la interfaz dichos alojamientos.

## Ejercicio #4

### Duración: 3 horas y 30 minutos

Para la generación de reportes, se optó por utilizar un patrón strategy, el cual permite seleccionar de manera adecuada cómo se generará el reporte y así obtener su contenido. En el caso del reporte a PDF, se utilizó el patrón Singleton para poder estandarizar en el proyecto la generación de dichos reportes.

Del lado del frontend, se creó un nuevo formulario con la intención de que el formulario de Filtrar y Exportar tenga distintas responsabilidades, sumado a que el de Exportar posee un campo extra: Tipo de Reporte.
