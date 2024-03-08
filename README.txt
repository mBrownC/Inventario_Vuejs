Instrucciones de instalación y configuración - Inventario Vue.js

Este repositorio contiene un proyecto de Inventario desarrollado en Vue.js. A continuación, se detallan los pasos necesarios para descargar, configurar y ejecutar la aplicación correctamente.

Descarga y Configuración
Descarga el proyecto desde este repositorio.
Descomprime el archivo descargado en la carpeta htdocs (para XAMPP) o www (para WAMP) de tu servidor Apache, según la distribución que estés utilizando.
Configuración de la Base de Datos
Antes de cargar la aplicación, asegúrate de tener una base de datos MySQL disponible.
Utiliza el script inventariovuejs_productos.sql que se encuentra en el repositorio descargado para crear la base de datos. Este script creará la estructura de la base de datos necesaria para la aplicación, pero no contendrá datos.
Abre el archivo conexion.php ubicado en la carpeta bbdd del proyecto.
Modifica los datos de acceso a la base de datos según tus credenciales:

define('servidor', 'localhost'); // Mantener "localhost" si la base de datos se encuentra en el mismo servidor.
define('nombre_bbdd', 'inventariovuejs'); // Nombre de la base de datos creada con el script proporcionado.
define('usuario', 'tu_usuario'); // Ingresa el nombre de usuario de tu base de datos.
define('password', 'tu_contraseña'); // Ingresa la contraseña del usuario de la base de datos.

Ejecución de la Aplicación
Una vez configurada la base de datos y el servidor Apache, sigue estos pasos para ejecutar la aplicación:

Asegúrate de que tu servidor XAMPP o WAMP esté en funcionamiento.
Abre tu navegador web y navega a la siguiente URL: http://localhost/Inventario_Vuejs/index.php
Con estos pasos, la aplicación de Inventario Vue.js debería ejecutarse correctamente en tu entorno local.

¡Disfruta de tu aplicación de inventario! Si tienes alguna pregunta o problema, no dudes en contactarnos.

Nota: Si tienes alguna pregunta o problema durante la configuración o ejecución de la aplicación, no dudes en contactarnos browncoloma@gmail.com