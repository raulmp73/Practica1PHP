# Práctica 1 PHP

Abrir http://localhost/DAW/php%20DSW/Practica1PHP/ con Apache de XAMPP activo. Requiere PHP 7.4 o posterior. No utiliza base de datos.

Se incluyen las dos variantes de los PDF: User/crearUsuario.php y Element/createElement.php, compartiendo ws/interfaces/IToJson.php. Cada modelo tiene propiedades privadas, constructor, getters, setters y toJson(). Los formularios envían POST y la respuesta es JSON.

Los registros se añaden como una línea JSON por registro a ws/data/usuarios.txt y ws/data/elementos.txt con FILE_APPEND y LOCK_EX. Los ficheros se crean en el primer envío. La carpeta debe permitir escritura a PHP. Apache bloquea el acceso web directo a los datos mediante .htaccess.

El formulario original de HTML no estaba disponible. Para usuarios se han usado los campos documentados en el ejercicio local: nombre, apellidos, contraseña, teléfono, email y sexo. Para MONFAB se han supuesto nombre, descripción, categoría y cantidad; adaptar formulario, modelo y controlador si el formulario original contiene otros campos.

La propiedad contrasena del JSON contiene el hash obtenido con password_hash, nunca la contraseña original. Los errores de validación devuelven HTTP 422, GET a los controladores devuelve 405 y las altas correctas devuelven 201.

La publicación en GitHub y el envío del enlace se realizan por separado; esta solución está preparada localmente.
