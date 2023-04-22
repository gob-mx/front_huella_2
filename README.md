# Ubuntu 22.04 LTS - Ambiente para Laravel

### Requisitos Previos

- Servidor con Ubuntu 22.04 como SO
- Privilegios de usuario: usuario **root** o no root con **privilegios sudo**

### Paso 1. Actualizar el sistema

Cada nueva instalación de Ubuntu 22.04 requiere que los paquetes del sistema se actualicen a las últimas versiones disponibles:

        sudo apt-get update -y && sudo apt-get upgrade -y

### Paso 2. Instalar `PHP` 8.1 con dependencias:

Para instalar PHP en su ultima version actual (8.1.2) junto con las extensiones, ejecute el siguiente comando:

        apt-get install php php8.1-curl php8.1-pgsql php-dom php-mbstring php-xml php-bcmath

### Paso 3. Instalar `Git`:

        apt-get install git

### Paso 4. Instalar `PostgreSql`:

        apt-get install postgresql








# Metronic - Bootstrap 5 HTML & Laravel Admin Dashboard Theme



### Inicio rápido de Laravel

1. Instalar `Composer`:

        apt install composer

2. Verifique que Composer se instaló correctamente y aparecerá la versión de Composer instalada:
   
        composer --version


3. Instalar dependencias `Composer`:
   
        composer install

4. Copie el archivo `.env.example` y cree un duplicado. Use cpel comando para usuarios de Linux o Max:

        cp .env.example .env

    Si está usando `Windows`, use `copy` en lugar de `cp`:
   
        copy .env.example .env
   
5. Cree una tabla en la base de datos MySQL o PostgreSQL y complete los detalles de la base de datos `DB_DATABASE` en el archivo `.env`.

6. El siguiente comando creará tablas en la base de datos utilizando la migración y la sembradora de Laravel.

        php artisan migrate:fresh --seed

7. Genere link simbolico para accesar a las rutas storage como los avatares y se muestren correctamente.

        php artisan storage:link


8. Genere llave de cifrado de su aplicación:

        php artisan key:generate


9. Inicie el servidor localhost:
    
        php artisan serve
