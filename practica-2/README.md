# Práctica 2 – Herencia en PHP

## Objetivo

Implementar herencia mediante la extensión de clases, reutilizando atributos y métodos de una clase base (`Usuario`) en una clase hija (`Admin`).

---

## Explicación de la herencia aplicada

La herencia permite que una clase **hija** adquiera automáticamente todos los atributos y métodos `public` y `protected` de una clase **base**, evitando duplicar código.

En esta práctica:

```
Usuario  ◄──────  Admin
(base)   extends  (hija)
```

- `Admin` usa `extends Usuario`, por lo que hereda:
  - Los atributos privados `$nombre` y `$correo`
  - El constructor `__construct($nombre, $correo)`
  - Los métodos `getNombre()`, `getCorreo()`, `setNombre()`, `setCorreo()`
- `Admin` agrega su propio método `getRol()` que retorna `"Administrador"`.

---

## Diferencias entre Usuario y Admin

| Característica | `Usuario` | `Admin` |
|---|---|---|
| Tipo | Clase base | Clase hija |
| `$nombre` | ✓ Definido aquí | ✓ Heredado |
| `$correo` | ✓ Definido aquí | ✓ Heredado |
| `getNombre()` | ✓ Definido aquí | ✓ Heredado |
| `getCorreo()` | ✓ Definido aquí | ✓ Heredado |
| `setNombre()` | ✓ Definido aquí | ✓ Heredado |
| `setCorreo()` | ✓ Definido aquí | ✓ Heredado |
| `getRol()` | ✗ No existe | ✓ Propio de Admin |

---

## Estructura de archivos

```
practica-2/
├── Usuario.php   ← Clase base (reutilizada de práctica 1)
├── Admin.php     ← Clase hija que extiende Usuario
├── index.php     ← Prueba de herencia en el navegador
└── README.md     ← Esta documentación
```

---

## Instrucciones de ejecución

### Opción A – Servidor integrado de PHP

```bash
# Dentro de la carpeta practica-2
php -S localhost:8000
```

Abrir en el navegador: [http://localhost:8000](http://localhost:8000)

### Opción B – XAMPP

1. Copiar `practica-2/` en `C:\xampp\htdocs\practica-2\`
2. Iniciar Apache desde el panel de XAMPP
3. Abrir: `http://localhost/practica-2/`

---

## Salida esperada

El navegador muestra dos tarjetas:

1. **Usuario (clase base):** nombre y correo del objeto Admin, accedidos mediante los métodos heredados.
2. **Admin (clase hija):** nombre, correo y rol `Administrador`, demostrando la reutilización de código y el método propio.
