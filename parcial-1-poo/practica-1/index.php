<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 1</title>
    <style>
        body {
            background-color: #f0f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 520px;
            width: 100%;
        }

        

        .card {
            background: #edf2f7;
            padding: 20px 24px;
        }


        .field {
            display: flex;
            gap: 10px;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>

<?php
require_once 'Usuario.php';

//Crear una instancia de la clase Usuario
$usuario = new Usuario('Aydali Berenis', 'Ayda8782@gmail.com');
?>

<div class="container">
    <h1>Práctica 1</h1>
    <p class="subtitle">Encapsulamiento con atributos privados, getters y setters</p>

    <!-- Valores iniciales via getters -->
    <p class="section-title">Instancia inicial getters</p>
    <div class="card">
        <h2>Datos del Usuario</h2>
        <div class="field">
            <span class="label">Nombre:</span>
            <span class="value"><?= htmlspecialchars($usuario->getNombre()) ?></span>
        </div>
        <div class="field">
            <span class="label">Correo:</span>
            <span class="value"><?= htmlspecialchars($usuario->getCorreo()) ?></span>
        </div>
    </div>

    <?php
    //Usar setters para actualizar los valores
    $usuario->setNombre('Aydali Nevarez');
    $usuario->setCorreo('ayda8782@gmail.com');
    ?>

    <!-- Valores actualizados via setters + getters -->
    <p class="section-title">Valores actualizados después de usar setters</p>
    <div class="card">
        <h2>Datos Actualizados</h2>
        <div class="field">
            <span class="label">Nombre:</span>
            <span class="value"><?= htmlspecialchars($usuario->getNombre()) ?></span>
        </div>
        <div class="field">
            <span class="label">Correo:</span>
            <span class="value"><?= htmlspecialchars($usuario->getCorreo()) ?></span>
        </div>
    </div>
</div>
</body>
</html>
