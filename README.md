# Portal Empresarial para Simulación Empresarial con Laravel, Tailwind CSS y Livewire

Este proyecto consiste en un portal empresarial construido con Laravel, Tailwind CSS y Livewire, diseñado para facilitar la simulación de entornos empresariales ficticios. Permite a diferentes centros educativos registrar alumnos y profesores, quienes pueden crear y gestionar empresas virtuales, asignando alumnos a cada una de ellas. Estos alumnos luego ingresan a un entorno de simulación empresarial, donde participan en actividades que imitan situaciones del mundo real.

## Contenido del Repositorio

- **`app/`**: Contiene el código fuente del portal empresarial construido con Laravel.
- **`resources/`**: Recursos como vistas y estilos, construidos con Tailwind CSS y Livewire.
- **`database/`**: Migraciones y semillas para la base de datos.
- **`tests/`**: Pruebas unitarias y de integración.
- **`README.md`**: Este archivo, proporcionando información detallada sobre el proyecto.

## Requisitos del Sistema

- **PHP y Composer**: Se requiere PHP y Composer para la ejecución del proyecto Laravel.
- **Node.js y npm**: Necesarios para la gestión de dependencias y activos.
- **Base de Datos**: El sistema utiliza una base de datos para almacenar información de profesores, alumnos y empresas.

## Configuración del Entorno

1. **Instalación de Dependencias PHP**: Ejecute `composer install` para instalar las dependencias PHP.
2. **Instalación de Dependencias Node.js**: Ejecute `npm install` para instalar las dependencias de Node.js.
3. **Configuración de la Base de Datos**: Configure las credenciales en el archivo `.env` para la base de datos.
4. **Ejecución del Servidor**: Inicie el servidor con `php artisan serve`.

## Funcionalidades del Portal Empresarial

### Registro y Autenticación

- **Registro de Profesores y Alumnos**: Utiliza las funcionalidades de Laravel para registrar profesores y alumnos.
- **Autenticación Segura**: Laravel Sanctum o Passport para garantizar la autenticación segura.

### Gestión de Empresas

- **Creación de Empresas**: Utiliza el sistema de controladores y modelos de Laravel.
- **Asignación de Alumnos**: Livewire se utiliza para la asignación dinámica de alumnos a empresas.

### Simulación Empresarial

- **Entorno Virtual**: Livewire facilita la creación de un entorno virtual interactivo.
- **Actividades Simuladas**: Livewire se utiliza para crear actividades simuladas en tiempo real.

### Seguimiento y Evaluación

- **Seguimiento del Desempeño**: Utiliza las capacidades de Eloquent para realizar un seguimiento del desempeño de los alumnos.
- **Retroalimentación Personalizada**: Livewire permite proporcionar retroalimentación personalizada en tiempo real.

## Desarrollo y Contribuciones

- **Contribuciones Bienvenidas**: Se anima a la comunidad a contribuir al desarrollo del proyecto.
- **Reporte de Problemas**: Informe cualquier problema a través de la sección de problemas del repositorio.

## Licencia

Este proyecto está bajo la licencia [MIT](LICENSE), lo que permite el uso, copia y modificación del código de manera libre.

¡Gracias por contribuir al éxito de este proyecto! ¡Esperamos que el Portal Empresarial para Simulación Empresarial sea de gran utilidad en entornos educativos!
