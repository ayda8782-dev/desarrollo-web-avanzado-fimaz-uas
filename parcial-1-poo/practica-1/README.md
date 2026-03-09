# Práctica 1 – Programación Orientada a Objetos en PHP

## Objetivo

Aplicar los fundamentos de la Programación Orientada a Objetos en PHP, implementando una clase con atributos privados, constructor y métodos de acceso (getters/setters), siguiendo buenas prácticas de encapsulamiento.

---

## Descripción de la clase

### `Usuario.php`

La clase `Usuario` modela a un usuario del sistema con los siguientes elementos:

| Elemento | Tipo | Descripción |
|---|---|---|
| `$nombre` | `private string` | Nombre completo del usuario |
| `$correo` | `private string` | Correo electrónico del usuario |
| `__construct($nombre, $correo)` | Constructor | Inicializa ambos atributos |
| `getNombre()` | Getter | Retorna el nombre del usuario |
| `getCorreo()` | Getter | Retorna el correo del usuario |
| `setNombre($nombre)` | Setter | Actualiza el nombre del usuario |
| `setCorreo($correo)` | Setter | Actualiza el correo del usuario |

**Principio aplicado:** los atributos son `private`, por lo que solo se pueden leer o modificar a través de los métodos públicos de la clase, garantizando el **encapsulamiento**.

---

## Estructura de archivos

```
practica-1/
├── Usuario.php   ← Definición de la clase
├── index.php     ← Prueba de la clase en el navegador
└── README.md     ← Esta documentación
```

---

## Instrucciones de ejecución

### Requisitos
- PHP 8.0 o superior instalado.
- Servidor local (XAMPP, Laragon, WAMP, o PHP built-in server).

### Opción A – Servidor integrado de PHP

```bash
# Dentro de la carpeta practica-1
php -S localhost:8000
```

Luego abrir en el navegador: [http://localhost:8000](http://localhost:8000)

### Opción B – XAMPP / WAMP

1. Copiar la carpeta `practica-1` dentro de `htdocs` (XAMPP) o `www` (WAMP).
2. Iniciar Apache desde el panel de control.
3. Abrir en el navegador: `http://localhost/practica-1/`

---

## Salida esperada

El navegador mostrará dos tarjetas:

1. **Instancia inicial** – valores asignados en el constructor (`Ana García`, `ana.garcia@ejemplo.com`).
2. **Después de usar setters** – valores actualizados con `setNombre()` y `setCorreo()` (`Carlos López`, `carlos.lopez@ejemplo.com`).
