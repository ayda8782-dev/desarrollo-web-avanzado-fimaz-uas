# Práctica 3 – Herencia, Validaciones y Manejo de Excepciones en PHP

## Objetivo

Desarrollar un sistema orientado a objetos robusto integrando herencia, validaciones de datos y manejo de excepciones para simular un entorno profesional.

---

## Descripción del sistema

El sistema gestiona usuarios de distintos roles dentro de una institución. Está compuesto por una clase base y dos clases derivadas, todas con validaciones que lanzan excepciones ante datos incorrectos.

```
Usuario  (clase base — valida nombre y correo)
   ├── Admin   (hereda todo + getRol() → "Administrador")
   └── Alumno  (hereda todo + $matricula + getRol() → "Alumno")
```

---

## Flujo de clases

### `Usuario` (base)
- Atributos privados: `$nombre`, `$correo`
- Valida en el constructor:
  - Nombre no vacío
  - Correo con formato válido usando `filter_var(FILTER_VALIDATE_EMAIL)`
- Lanza `InvalidArgumentException` si alguna validación falla
- Expone `getNombre()`, `getCorreo()`, `setNombre()`, `setCorreo()`

### `Admin extends Usuario`
- Hereda todo de `Usuario`
- Agrega `getRol()` → `"Administrador"`

### `Alumno extends Usuario`
- Hereda todo de `Usuario`
- Agrega atributo privado `$matricula`
- Valida que la matrícula no esté vacía
- Agrega `getMatricula()`, `setMatricula()`, `getRol()` → `"Alumno"`

---

## Manejo de excepciones

Cada instanciación se envuelve en `try/catch`:

```php
try {
    $admin = new Admin('Laura Martínez', 'laura@uas.edu.mx');
    echo $admin->getRol(); // "Administrador"
} catch (InvalidArgumentException $e) {
    echo 'Error: ' . $e->getMessage();
}
```

Casos que disparan la excepción:
| Caso | Mensaje |
|---|---|
| Correo sin `@` o dominio | `El correo "x" no tiene un formato válido.` |
| Nombre vacío | `El nombre no puede estar vacío.` |
| Matrícula vacía (Alumno) | `La matrícula no puede estar vacía.` |

---

## Estructura de archivos

```
practica-3/
├── clases/
│   ├── Usuario.php   ← Clase base con validaciones
│   ├── Admin.php     ← Clase hija: rol Administrador
│   └── Alumno.php    ← Clase hija: rol Alumno + matrícula
├── index.php         ← Pruebas con try/catch
└── README.md         ← Esta documentación
```

---

## Instrucciones de ejecución

### Opción A – Servidor integrado de PHP
```bash
cd practica-3
php -S localhost:8000
```
Abrir: [http://localhost:8000](http://localhost:8000)

### Opción B – XAMPP
1. Copiar `practica-3/` en `C:\xampp\htdocs\practica-3\`
2. Iniciar Apache desde el panel de XAMPP
3. Abrir: `http://localhost/practica-3/`

---

## Salida esperada

**Objetos válidos:** se muestran tarjetas con nombre, correo, rol y matrícula (Alumno).  
**Excepciones:** se muestran tarjetas de error con el mensaje controlado de `InvalidArgumentException`.
