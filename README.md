# Innclod
## Ejecutar proyecto Laravel y Angular

### Backend

1. Clonar el repositorio: `git clone https://github.com/usuario/repo.git`
2. Acceder a la carpeta `backend` del proyecto: `cd repo/backend`
3. Instalar las dependencias de PHP: `composer install`
4. Configurar las variables de entorno en un archivo `.env` basado en `.env.example`
5. Ejecutar las migraciones de la base de datos: `php artisan migrate`
6. Ejecutar el seeder de usuario por defecto: `php artisan db:seed --class=DefaultUserSeeder`
7. Ejecutar el seeder de Procesos por defecto: `php artisan db:seed --class=ProcesosSeeder`
8. Ejecutar el seeder de Tipo docs por defecto: `php artisan db:seed --class=TipoDocSeeder`
9. Iniciar el servidor local: `php artisan serve`

### End points
1.Crear document `api/create/document`
2.Update document `api/update/document/{id}`
3.getAll document `api/documents`

### Frontend

1. Acceder a la carpeta `frontend` del proyecto: `cd repo/frontend`
2. Instalar las dependencias de Node.js: `npm install`
3. Iniciar el servidor de desarrollo: `ng serve`

Una vez realizado estos pasos, podrás acceder al proyecto en tu navegador web en la dirección `http://localhost:8000` para el backend y `http://localhost:4200` para el frontend.

