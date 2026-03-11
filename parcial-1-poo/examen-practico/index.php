<?php

require_once 'Usuario.php';
require_once 'Admin.php';
require_once 'Alumno.php';

$usuarios  = [];
$errores   = [];

try {
    $admin = new Admin("Aydali Berenis", "ayda8782@gmail.com");
    $usuarios[] = $admin;
} catch (Exception $e) {
    $errores[] = $e->getMessage();
}

try {
    $alumno1 = new Alumno("María López", "maria.lopez@gmail.com", "23547878");
    $usuarios[] = $alumno1;
} catch (Exception $e) {
    $errores[] = $e->getMessage();
}

try {
    $alumno2 = new Alumno("Juan Pérez", "juan.perezuniversidad", "45213451");
    $usuarios[] = $alumno2;
} catch (Exception $e) {
    $errores[] = $e->getMessage();
}



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Usuarios</title>
    <style>  

        table {
            width: 50%;
            border-collapse: collapse;
        }

        thead {
            background: #234464ff;
            color: #fff;
        }

        thead th {
            padding: 14px 18px;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        tbody tr:hover { background: #eaf0fb; }

        tbody td {
            padding: 12px 18px;
            font-size: 0.95rem;
            border-bottom: 1px solid #e9ecef;
        }

        .badge {
            display: inline-block;
            padding: 3px 10px;
            border-radius: 12px;
            font-size: 0.8rem;
            font-weight: 600;
        }

      

        .error-card {
            background: #fff3cd;
            border-radius: 6px;
            padding: 12px 16px;
            margin-bottom: 10px;
            font-size: 0.9rem;
        }

    </style>
</head>
<body>

    <h1>Sistema de Usuarios</h1>

    <!-- TABLA DE USUARIOS -->
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Matrícula</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($usuarios)): ?>
                    <tr>
                        <td colspan="5" style="text-align:center">
                            No hay usuarios registrados.
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($usuarios as $i => $u): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= htmlspecialchars($u->getNombre()) ?></td>
                            <td><?= htmlspecialchars($u->getCorreo()) ?></td>
                            <td>
                                <?php $rol = $u->getRol(); ?>
                                <span class="badge <?= $rol === 'Administrador' ? 'badge-admin' : 'badge-alumno' ?>">
                                    <?= htmlspecialchars($rol) ?>
                                </span>
                            </td>
                            <td>
                                <?php if ($u instanceof Alumno): ?>
                                    <?= htmlspecialchars($u->getMatricula()) ?>
                                <?php else: ?>
                                    <span class="badge-na">N/A</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <?php if (!empty($errores)): ?>
        <div class="errores-section">
            <h2>Errores capturados</h2>
            <?php foreach ($errores as $error): ?>
                <div class="error-card">
                    <span><?= htmlspecialchars($error) ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</body>
</html>
