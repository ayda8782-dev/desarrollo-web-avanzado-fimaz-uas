<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 2</title>
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
require_once 'Admin.php';

//hereda constructor de Usuario
$admin = new Admin('Aydali Berenis', 'ayda8782@gmail.com');
?>

<div class="container">
    <h1>Práctica 2</h1>
    <p class="subtitle">Extensión de clases con extends</p>

    <!-- Clase base -->
    <p class="section-label">Clase Usuario</p>
    <div class="card card-usuario">
        <h2>Usuario</h2>
        <div class="field">
            <span class="label">Nombre:</span>
            <span class="value"><?= htmlspecialchars($admin->getNombre()) ?></span>
        </div>
        <div class="field">
            <span class="label">Correo:</span>
            <span class="value"><?= htmlspecialchars($admin->getCorreo()) ?></span>
        </div>
    </div>

    <!-- Clase hija -->
    <p class="section-label">Clase Admin</p>
    <div class="card card-admin">
        <h2>Admin</h2>
        <div class="field">
            <span class="label">Nombre:</span>
            <span class="value"><?= htmlspecialchars($admin->getNombre()) ?></span>
        </div>
        <div class="field">
            <span class="label">Correo:</span>
            <span class="value"><?= htmlspecialchars($admin->getCorreo()) ?></span>
        </div>
        <div class="field">
            <span class="label">Rol:</span>
            <span class="value">
                <span class="rol-badge"><?= htmlspecialchars($admin->getRol()) ?></span>
            </span>
        </div>
    </div>
</div>
</body>
</html>
