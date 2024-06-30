## Ejercicio #1 Importación de datos

### Duración: 4hrs y 40mnts

### Observaciones

- El dato de cocina equipada se repetia en "Cocina equipada" - "Cocina Equipada".
- El campo "Calefacción individual" posee campos texto y booleandos, se reemplaza TRUE por SI
- Algunos campos en vez de devolver "FALSE" devuelven texto vacio, se reeemplaza por un "false" booleano
- El campo fecha viene con formato incorrecto en algunos casos. Por ejemplo: 2019/0/meses, se dejara como NULL

### Analisis

Se separara la información del CSV en la siguiente estructura

#### Accomation - (Alojamiento)

El campo "ID" se guarda como "original_id", esto para poder referenciarlo de ser necesario y no perder la secuencia de la tabla.

- original_id - ID
- title - Titulo
- advertiser - Anunciante
- description - Descripcion
- phones - Telefonos
- type - Tipo
- price - Precio
- meters - Metros cuadrados
- meter_price - Precio por metro
- useful_meters - Metros cuadrados útiles
- register_at - Fecha
- built_in - Construido en

#### AccomationLocation - (Localización del Alojamiento)

- latitude - Latitud
- longitude - Longitud,
- address - Direccion
- province - Provincia
- city - Ciudad
- street - Calle
- neighborhood - Barrio
- district - Distrito

#### AccomationDetail - (Detalles del Alojamiento)

- reformed - Reformado
- bedrooms - Habitaciones
- bathrooms - Baños
- parking - Parking
- second_hand - Segunda mano
- built_in_wardrobes - Armarios Empotrados
- furnished - Amueblado
- floor - Planta
- exterior - Exterior
- interior - Interior
- elevator - Ascensor
- terrace - Terraza
- storage_room - Trastero
- pool - Piscina
- garden - Jardín
- balcony - Balcón
- individual_heating - Calefacción individual
- energetic_certification - Certificación energética
- equipped_kitchen - Cocina Equipada
- air_conditioning - Aire acondicionado
- suitable_mobility - Apto para personas con movilidad reducida
- plants - Plantas
- pets_allowed - Se admiten mascotas

## Ejercicio #2

### Duracion: 8hrs

Durante este periodo se empezo por crear la interfac grafica para el acceso al usuario. La interfaz le permite al usuario poder filtrar la información y tambien se pagina para que tenga una facil lectura.

Para el filtrado de la información se creo un Patron Builder el cual crear la query necesaria de manera dinamica tomando en cuanta los parametros ingresados. Entro otros patrones o capaz cabe mencionar la capa de Repository donde se generan las consultas y la de servicios que ayuda a separar la logica de negocio.

Del lado de la interfaz grafica, se instalo el modulo de Boostrap y Bootswatch para poder customizar Boostrap de manera rapida con un tema ya definido.

Los filtros solicitados fueron

- Rango de precios (Menor, mayor)
- Cantidad de Habitaciones

El paso que tomó más tiempo fue el desarrollo de la interfaz de usuario.

## Ejercicio #3

### Duración: 2hrs

Se inicio con un etapa de investigación, puesto que no se conocia como realizar la tarea. Investigando en internet encontre información sobre la [Formula Harvisine](https://es.scribd.com/presentation/675358086/Ley-de-Haversine). 

Una vez comprendida como funciona, se procedio a realizar pruebas y a implementar en el patron Builder de los filtros, esto permitio no solo obtener el promedio del valor de los alojamientos en esa zona, sino tambien poder filtrar y mostrar por la interfaz dichos alojamientos. 




