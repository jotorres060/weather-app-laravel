## Weather app

Weather app es una aplicación web que permite obtener la información meteorológica de algunas ciudades
de Estados Unidos mediante la conexión a la Yahoo Weather API.

Una vez obtenida la información, se muestra en un mapa la ubicación de la ciudad y dentro de este una
ventana emergente con parte de la información.

Adicionalmente, cuenta con una funcionalidad de historial la cual permite observar las peticiones que
se han efectuado durante el tiempo.

## Instalación

Para hacer uso de esta aplicación siga los siguientes pasos:

1. `git clone https://github.com/jotorres060/weather-app-laravel.git`
2. `composer install`
3. `php artisan key:generate`   
4. Realice una copia del archivo `.env.example` y renómbrelo a `.env`
5. Cree una base de datos, un usuario y una contraseña. Si lo desea puede crear los datos de la siguiente manera,
   tenga en cuenta que esto es solo para ambientes de prueba:
    - Base de datos => weather_history
    - Usuario => root
    - Password => 
6. Asigne los datos creados a las variables de entorno en el archivo `.env`
    - DB_DATABASE=weather_history
    - DB_USERNAME=root
    - DB_PASSWORD=
7. Por medio de una terminal de comandos y situado en el proyecto, ejecute la siguiente instrucción:  
   `php artisan migrate`
8. La API de Yahoo requiere de credenciales para hacer uso de su servicio, para obtenerlas debe seguir los pasos
   indicados en la siguiente página `https://developer.yahoo.com/weather`.  
   
   Una vez obtenga las credenciales, agregue las siguientes variables de entorno en su archivo `.env`
   ingresando los datos que fueron brindados por el servicio de Yahoo:
    - WEATHER_APP_ID=
    - WEATHER_CONSUMER_KEY=
    - WEATHER_CONSUMER_SECRET=
9. Abra su navegador de preferencia y escriba la ruta del proyecto hasta la carpeta `public`. Si se encuentra
    utilizando una herramienta como XAMPP puede escribir lo siguiente en el navegador:  
   `http://localhost/weather-app-laravel/public`
