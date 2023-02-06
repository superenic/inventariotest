# instalacion
## requerimientos
* docker desktop 20.10.12 o superior.
* ejecutar las siguiente lineas de comando, dentro del folder `docker-containers\docker-compose` para la instalacion de los contenedores. ya se tiene instalado las versiones necesarias de composer y npm, pero si tu maquina tiene estos manejadores de paquetes, los puedes ejecutar fuera el contenedor.
* `docker compose up -d`
* entrar al contenedor `docker exec -ti inventario bash` y ejecutar:
    * `composer install`
    * `npm install`
    * `npm run dev` o `npm run prod` si ves que javascript tiene problemas, se subieron los archivos publico para que no se tenga, pero si llega el caso ejecuta los comandos mencionados.
> si llegas a tener problemas de los paquets algunas veces es mejor usar `yarn`
    * `npm install --global yarn`
    * `yarn install`
    * `yarn run dev` o `yarn run prod

nombre de los contenedores `inventario` y `inventariodb`

Copia el archivo `.env.example` y renombralo a `.env` en el mismo folder o simplemente renombralo a `.env`

[regresar](../README.md)
