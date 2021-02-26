## Aplicación simple de inventario

Para la aplicación se usó el framework Slim V4, principalmente para generar las rutas de una manera rápida y ordenada.

Se hace uso de una libreria propia llamada DB.php en la carpeta Helpers, la cual es una simplificación de los métodos básicos de MySql  bajo la instancia de PDO.

Se adjunta además la colección de postman con las peticiones a la API, mostrando la correcta implementación de lo requerido, en el archivo "Inventario simple.postman_collection.json", así con dicho programa (postman) puede hacer una prueba del funcionamietno del PHP

Para las vistas se crea la carpeta "client", la cual es una aplicación usando el framework Angular que hace las peticiones al php, por temas de tiempo no pude implementar correctamente las vistas.

Por último recordad instalar las dependencias con *comoposer install* y en la carpeta clien con *npm install*, por lo que se requiere para el funcionamiento del programa tanto *composer* como *node.js*.

El archivo base de la aplicación es index.php, ubicado en la carpeta raíz.