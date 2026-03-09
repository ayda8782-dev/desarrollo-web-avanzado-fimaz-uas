# Práctica 4 – Mini-sistema POO en PHP

## Objetivo

Construir un mini-sistema POO en PHP que integra encapsulamiento, herencia, polimorfismo básico, validación de datos y manejo de excepciones, con salida en tabla HTML.

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
    $usuarios[] = new Admin('Aydali Nevarez', 'ayda8782@gmail.com');       // válido
    $usuarios[] = new Alumno('Aydali Berenis', 'AydaliN@gmail.com', '87905645'); // válido
    $usuarios[] = new Invitado('Aydali Berenis', 'dali123@gmail.com', 'TechCorp'); // válido
    $usuarios[] = new Admin('Aydali', 'aydli@@gmail.com');         // ← lanza Exception
} catch (Exception $e) {
    echo 'Error controlado: ' . $e->getMessage();
}
```
