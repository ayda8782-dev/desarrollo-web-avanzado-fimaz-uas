<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 3</title>
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
require_once __DIR__ . '/clases/Admin.php';
require_once __DIR__ . '/clases/Alumno.php';

// ── Objeto Admin válido ──────────────────────────────────────
$admin = null;
try {
    $admin = new Admin('Aydali Berenis', 'ayda8782@gmail.com');
} catch (InvalidArgumentException $e) {
    $errorAdmin = $e->getMessage();
}

// ── Objeto Alumno válido ─────────────────────────────────────
$alumno = null;
try {
    $alumno = new Alumno('Aydali Nevarez', 'aydaliNeva@uas.edu.mx', '1457896');
} catch (InvalidArgumentException $e) {
    $errorAlumno = $e->getMessage();
}

// ── Objeto inválido — correo mal escrito ─────────────────────
$errorInvalido = null;
try {
    new Admin('Aydali Nevarez', 'ayda8782@@gmail.com');
} catch (InvalidArgumentException $e) {
    $errorInvalido = $e->getMessage();
}
?>
<div class="container">
    <header>
        <h1>Práctica 3</h1>
        <p class="subtitle">Herencia, validaciones y manejo de excepciones</p>
    </header>

   <!-- ── Objetos válidos ── -->
    <p class="section-label">Objetos creados correctamente</p>

    <?php if ($admin): ?>
    <div class="card card-admin">
        <h2>Administrador</h2>
        <div class="field"><span class="label">Nombre:</span><span class="value"><?= htmlspecialchars($admin->getNombre()) ?></span></div>
        <div class="field"><span class="label">Correo:</span><span class="value"><?= htmlspecialchars($admin->getCorreo()) ?></span></div>
        <div class="field"><span class="label">Rol:</span><span class="value"><?= $admin->getRol() ?></span></div>
    </div>
    <?php endif; ?>

    <?php if ($alumno): ?>
    <div class="card card-alumno">
        <h2>Alumno</h2>
        <div class="field"><span class="label">Nombre:</span><span class="value"><?= htmlspecialchars($alumno->getNombre()) ?></span></div>
        <div class="field"><span class="label">Correo:</span><span class="value"><?= htmlspecialchars($alumno->getCorreo()) ?></span></div>
        <div class="field"><span class="label">Matrícula:</span><span class="value"><?= htmlspecialchars($alumno->getMatricula()) ?></span></div>
        <div class="field"><span class="label">Rol:</span><span class="value"><?= $alumno->getRol() ?></span></div>
    </div>
    <?php endif; ?>

    <!-- ── Excepción controlada ── -->
    <p class="section-label">Excepción controlada</p>

    <?php if ($errorInvalido): ?>
    <div class="card card-error">
        <h2>Correo inválido detectado</h2>
        <div class="field"><span class="label">Error:</span><span class="value"><?= htmlspecialchars($errorInvalido) ?></span></div>
    </div>
    <?php endif; ?>
</div>
</body>
</html>
