# Documentación de la mejora del CRUD

Esta documentación describe la mejora realizada sobre un conjunto inicial de archivos PHP para la gestión básica de usuarios en una base de datos MySQL. Se compara el estado original del proyecto, con problemas de seguridad y usabilidad, frente a una versión corregida y mejorada que aplica buenas prácticas de desarrollo web.

---

## 1. Estado inicial: archivos originales

**Archivos originales:**
- `index.php`
- `add.php`
- `edit.php`
- `delete.php`
- `db.php`

### Problemas detectados

- **Validación insuficiente:** No se validan correctamente los datos de entrada, lo que permite registros erróneos.
- **Mensajes poco claros:** El usuario no recibe información clara sobre el éxito o error de las operaciones.

---

## 2. Versión mejorada: archivos corregidos

### Mejoras implementadas

#### A. Estilos y diseño
Se añadió CSS personalizado y fuentes externas (Google Fonts) para mejorar la visualización. Se utilizan colores suaves, bordes redondeados y tablas estilizadas para una experiencia más profesional.

#### B. Separación de funciones
Cada archivo cumple una función específica:
- `dbtest.php`: Verifica la conexión con la base de datos y muestra mensajes visuales.
- `add_user.php`: Permite añadir un usuario nuevo, valida datos y muestra la lista de usuarios.
- `show_users.php`: Presenta la tabla completa de usuarios registrados.

#### C. Validación y seguridad
Se implementan validaciones del lado del servidor, asegurando que el email tenga formato correcto. Se utilizan **consultas preparadas** para evitar inyecciones SQL y mejorar la seguridad de las operaciones en la base de datos.

#### F. Organización y mantenibilidad
El código se estructura de forma que cada archivo es fácil de identificar y modificar. Las conexiones a la base de datos se gestionan correctamente y se cierran al finalizar cada operación.

## 4. Resumen

La versión mejorada transforma una solución básica y poco segura en una aplicación web robusta, segura y agradable para el usuario.  
El sistema implementa buenas prácticas en diseño, seguridad y experiencia de usuario, facilitando el mantenimiento y futuras ampliaciones.

---
