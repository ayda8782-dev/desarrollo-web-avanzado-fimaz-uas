<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
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
            border-radius: 8px;
            margin-bottom: 16px;
        }

        .card-error {
            background: #edf2f7;
            padding: 20px 24px;
            border-radius: 8px;
            margin-bottom: 16px;
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
require_once __DIR__ . '/clases/Invitado.php';

// ── Objetos válidos ──────────────────────────────────────────
$admin    = null;
$alumno   = null;
$invitado = null;

try {
    $admin    = new Admin('Aydali Nevarez', 'ayda8782@gmail.com');
    $alumno   = new Alumno('Aydali Berenis', 'AydaliN@gmail.com', '45789524');
    $invitado = new Invitado('Aydali Quintana', 'dali123@gmail.com', 'UAS');
} catch (Exception $e) {
    $errorMsg = $e->getMessage();
}

// ── Objeto inválido — correo mal escrito ─────────────────────
$errorInvalido = null;
$errorNombre   = 'Aydli Nevarez';
$errorCorreo   = 'ayda8782@@gmail.com';
try {
    new Admin($errorNombre, $errorCorreo);
} catch (Exception $e) {
    $errorInvalido = $e->getMessage();
}
?>

<div class="container">
    <h1>Práctica 4</h1>

    <!-- ── Admin ── -->
    <p class="section-label">Administrador</p>
    <?php if ($admin): ?>
    <div class="card">
        <div class="field"><span class="label">Nombre:</span><span class="value"><?= htmlspecialchars($admin->getNombre()) ?></span></div>
        <div class="field"><span class="label">Correo:</span><span class="value"><?= htmlspecialchars($admin->getCorreo()) ?></span></div>
        <div class="field"><span class="label">Rol:</span><span class="value"><?= $admin->getRol() ?></span></div>
    </div>
    <?php endif; ?>

    <!-- ── Alumno ── -->
    <p class="section-label">Alumno</p>
    <?php if ($alumno): ?>
    <div class="card">
        <div class="field"><span class="label">Nombre:</span><span class="value"><?= htmlspecialchars($alumno->getNombre()) ?></span></div>
        <div class="field"><span class="label">Correo:</span><span class="value"><?= htmlspecialchars($alumno->getCorreo()) ?></span></div>
        <div class="field"><span class="label">Matrícula:</span><span class="value"><?= htmlspecialchars($alumno->getMatricula()) ?></span></div>
        <div class="field"><span class="label">Rol:</span><span class="value"><?= $alumno->getRol() ?></span></div>
    </div>
    <?php endif; ?>

    <!-- ── Invitado ── -->
    <p class="section-label">Invitado</p>
    <?php if ($invitado): ?>
    <div class="card">
        <div class="field"><span class="label">Nombre:</span><span class="value"><?= htmlspecialchars($invitado->getNombre()) ?></span></div>
        <div class="field"><span class="label">Correo:</span><span class="value"><?= htmlspecialchars($invitado->getCorreo()) ?></span></div>
        <div class="field"><span class="label">Empresa:</span><span class="value"><?= htmlspecialchars($invitado->getEmpresa()) ?></span></div>
        <div class="field"><span class="label">Rol:</span><span class="value"><?= $invitado->getRol() ?></span></div>
    </div>
    <?php endif; ?>

    <!-- ── Excepción controlada ── -->
    <p class="section-label">Excepción controlada</p>
    <?php if ($errorInvalido): ?>
    <div class="card-error">
        <div class="field"><span class="label">Nombre:</span><span class="value"><?= htmlspecialchars($errorNombre) ?></span></div>
        <div class="field"><span class="label">Correo:</span><span class="value value-error"><?= htmlspecialchars($errorCorreo) ?></span></div>
        <div class="field"><span class="label">Error:</span><span class="value value-error"><?= htmlspecialchars($errorInvalido) ?></span></div>
    </div>
    <?php endif; ?> 
</div>
</body>
</html>
