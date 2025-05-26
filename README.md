# Orion: Starter Kit 🚀

**Orion** es un Starter Kit listo para usar, diseñado para acelerar el desarrollo de paneles de administración en Laravel utilizando [MoonShine](https://moonshine-laravel.com/), un potente y flexible paquete de administración.

---

## ✨ Características principales

- 🛠️ Configuración predeterminada de **MoonShine**.
- 🔐 Integración de permisos basada en roles con [moonshine-roles-permissions](https://github.com/SWEET1S/moonshine-roles-permissions).
- 🎨 Dos temas de color preconfigurados listos para usar.
- 🌐 Soporte completo para idioma **español**.
- ⚙️ Comando para generar automáticamente todos los permisos de los recursos.
- 🔁 Trait `Properties` para definir propiedades encadenadas en los recursos.

> **Nota:** En el archivo config/orion.php puede configurar con true o false dependiendo que apartados quiere que se muestren o no.

---

## 🎨 Temas disponibles

| ![theme1](./.docs/theme1.png) | ![theme2](./.docs/theme2.png) |
|------------------------------|-------------------------------|

---

## 📦 Tecnologías

| Paquete                     | Versión |
|----------------------------|---------|
| Laravel                    | v11     |
| MoonShine                  | v3      |
| moonshine-roles-permissions | v3      |

---


## 🚀 Instalación

Sigue estos pasos para ejecutar el proyecto localmente:

1. Clona el repositorio
   ```bash
   git clone https://github.com/estivenm0/orion.git
    ```
2. Navega al directorio raíz del proyecto
    ```sh
    cd orion
    ```

3. Copia el archivo `.env.example` a `.env`
    ```sh
    cp .env.example .env
    ```

4. Instala las dependencias
    ```sh
    composer install
    ```

5. Genera la clave de la aplicación
    ```sh
    php artisan key:generate
    ```

6. Ejecuta las migraciones
    ```sh
    php artisan migrate
    ```

7. Genera los permisos y crea un rol Super Admin
    ```sh
    php artisan orion:permissions
    ```

8. Crea un Usuario
    ```sh
    php artisan moonshine-rbac:user
    ```
