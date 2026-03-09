# Práctica 4 – Mini-sistema POO en PHP

## Objetivo

Construir un mini-sistema POO en PHP que integra encapsulamiento, herencia, polimorfismo básico, validación de datos y manejo de excepciones, con salida en tabla HTML.

---

## Requisitos

- PHP 8.0 o superior
- XAMPP (Apache) o servidor integrado de PHP
- Navegador web

---

## Estructura del proyecto

```
practica-4/
├── clases/
│   ├── Usuario.php    ← Clase base (atributos protected, validación, getters)
│   ├── Admin.php      ← Hereda Usuario + getRol() → "Administrador"
│   ├── Alumno.php     ← Hereda Usuario + $matricula + getRol() → "Alumno"
│   └── Invitado.php   ← Hereda Usuario + $empresa  + getRol() → "Invitado"
├── index.php          ← Tabla HTML + try/catch
└── README.md
```

---

## Flujo del sistema

```
Usuario (base)
   ├── protected $nombre
   ├── protected $correo
   ├── __construct → valida correo con filter_var()
   │               → lanza Exception si es inválido
   ├── getNombre()
   └── getCorreo()
        │
        ├── Admin     → getRol(): "Administrador"
        ├── Alumno    → $matricula  · getMatricula() · getRol(): "Alumno"
        └── Invitado  → $empresa    · getEmpresa()   · getRol(): "Invitado"
```

### Polimorfismo
Las tres clases hijas implementan `getRol()` con distintos valores. El `index.php` itera todos los objetos con un solo `foreach` y llama al mismo método — cada objeto responde diferente según su clase.

---

## Manejo de excepciones

```php
try {
    $usuarios[] = new Admin('Laura', 'laura@uas.edu.mx');       // válido
    $usuarios[] = new Alumno('Pedro', 'pedro@uas.edu.mx', 'X'); // válido
    $usuarios[] = new Invitado('Sofía', 'sofia@emp.com', 'TechCorp'); // válido
    $usuarios[] = new Admin('Carlos', 'carlos@@correo');         // ← lanza Exception
} catch (Exception $e) {
    echo 'Error controlado: ' . $e->getMessage();
}
```

El objeto inválido nunca se agrega al arreglo; los tres válidos ya están guardados antes de que ocurra el error.

---

## Instrucciones de ejecución

### Opción A – Servidor integrado de PHP
```bash
cd practica-4
php -S localhost:8000
```
Abrir: [http://localhost:8000](http://localhost:8000)

### Opción B – XAMPP
1. Copiar `practica-4/` en `C:\xampp\htdocs\practica-4\`
2. Iniciar Apache desde el panel de XAMPP
3. Abrir: `http://localhost/practica-4/`

---

## Evidencia esperada

| Sección | Descripción |
|---|---|
| Tabla HTML | 3 filas con Admin, Alumno e Invitado. Columnas sin dato muestran "—". |
| Error controlado | Mensaje de excepción capturado bajo la tabla, sin error fatal. |

---

## Commits sugeridos (Git)

```bash
git add practica-4/
git commit -m "Crea estructura base de practica-4"

# después de terminar las clases:
git commit -m "Implementa clases Usuario/Admin/Alumno/Invitado"

# al finalizar:
git commit -m "Agrega index con tabla y manejo de excepciones"

git push
```
