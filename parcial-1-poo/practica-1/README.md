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
