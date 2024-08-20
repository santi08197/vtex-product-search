VTEX Product Search - SANTIAGO GONZALEZ

-clonar proyecto

-ejecutar $ composer install

-ejecutar $ php artisan migrate

Siguiendo esos pasos el proyecto deberia estar listo para usarse!

Para realizar pruebas ejecutar el siguiente comando:

    app:query-products {query}

Ejemplo:

    app:query-products "jacket"

Para probar los tests ejecutar

    $ php artisan test

Si al momento de ejecutar el comando se muestra el siguiente error:

    Illuminate\Database\QueryException: could not find driver (SQL: PRAGMA foreign_keys = ON;)

mi recomendación es comentar las líneas 25 y 26 del archivo phpunit.xml
Debería quedar así:

    <!-- <env name="DB_CONNECTION" value="sqlite"/>
        <env name="DB_DATABASE" value=":memory:"/> -->

Nota: al comentar esas líneas se va usar la misma base de datos de producción y se van a refrescar todos los datos cuando se termine de testear.

Esto se debe a que en la computadora en la que se está testeando probablemente no esté habilitado sqlite y la solución 
puede variar dependiendo las configuraciones de cada uno.

