# Entrevista PHP



Bienvenido a tu prueba de __PHP__, a continuación encontrarás una serie de requerimientos con los cuales deberás realizar un ejercicio práctico.

La prueba general se divide en pequeños ejercicios con los cuales se evaluará en práctica:
- Pensamiento lógico.
- Resolución de problema.
- Tiempo de desarrollo.
- Entre otros.

Se debe manejar POO (Programación Orientada  a Objetos), por lo que deberás crear una clase y esta a su vez debe contener los métodos.

Finalizada la prueba recuerda enviar link del proyecto o tu repositorio a la persona de recursos humans que te contacto con tu información de contacto y en el asunto colocar: PHP-INTERVIEW


> Recomendación: No importa terminar todos los ejercicios, lo más importante es la funcionalidad del ejercicio resuelto(s).

### Antes de empezar:
- Se necesita una base de datos MySQL.
- [Archivos CSV](https://github.com/rolandototo/Php-Test/blob/main/resource_accommodation.csv)


# Ejercicios

### 1. Importación de data.

__HABILIDADES:__
```
PHP, MYSQL
```
__PROBLEMA:__
> El siguiente [archivo (.csv)](https://github.com/rolandototo/Php-Test/blob/main/resource_accommodation.csv) contiene una seria de datos relacionados con el comercio inmobiliario. Ejemplo (Dirección del piso, Metros cuadrados, Características, entre otros)

__REQUERIMIENTO:__
El objetivo principal es crear un método en la clase, al cual se indique la ruta del archivo y esta sea capaz de leer el (.csv) e insertar los valores en una base de datos MySQL.


### 2. Filtrar data.

__HABILIDADES:__
```
PHP, MYSQL
```

__PROBLEMA:__
> Basado en el ejercicio #1 ya tenemos una base de datos funcional. Ahora necesitamos poder filtrar la data.

__REQUERIMIENTO:__
Se requiere un endpoint método GET el cual permita pasar atributos y poder filtrar el resultado de la data por: 
- Rango de precio mínimo y máximo.
-  Número de habitaciones.


### 3. Procesar data.

__HABILIDADES:__
```
PHP, MYSQL
```

__PROBLEMA:__
> En algunos casos necesitamos calcular el precio del alquiler por zona. Para ello necesitamos procesar la información de nuestra base de datos.

__REQUERIMIENTO:__
Se necesita una función en la cual se pasen 3 atributos (Latitud, Longitud, Distancia km), y está retorne el precio promedio del metro cuadrado.

![](https://i.stack.imgur.com/U1c9F.png)


### 4. Reportes data.

__HABILIDADES:__
```
PHP, MYSQL, PDF
```

__PROBLEMA:__
> En ocasiones se necesita generar reportes para el área administrativa, estos reportes deben ser en formato (PDF, CSV)

__REQUERIMIENTO:__
Se requiere un endpoint al cual se pasen los atributos de filtro, coordenadas y tipo de reporte (PDF, CSV) y dicho reporte generado se guarda en una carpeta.


### Extra.
Si has llegado hasta este punto, y consideras que tienes tiempo se valora el hecho de que puedas desplegar tu proyecto en [Heroku](https://www.heroku.com/) o en cualquier servidor de tu gusto.

Gracias por participar! 