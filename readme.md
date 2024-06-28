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
