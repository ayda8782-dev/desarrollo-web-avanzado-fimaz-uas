<?php
// Autor: Aydali Berenis Nevarez Quintana
spl_autoload_register(function ($clase) {
    $archivo = str_replace('\\', DIRECTORY_SEPARATOR, $clase) . '.php';
    if (file_exists($archivo)) {
        require_once $archivo;
    }
});

use Controllers\ProductoController;
use Models\Producto;

$controller = new ProductoController();
$mensaje = "";
$productoEditar = null;
$terminoBusqueda = "";

try {
    // ELIMINAR 
    if (isset($_GET['eliminar'])) {
        $idEliminar = $_GET['eliminar'];
        if ($controller->eliminar($idEliminar)) {
            $mensaje = "Producto eliminado correctamente.";
        }
    }

    // EDITAR : CARGAR DATOS EN FORMULARIO
    if (isset($_GET['editar'])) {
        $idEditar = $_GET['editar'];
        $productoEditar = $controller->obtenerPorId($idEditar);
    }

    // BUSCAR
    if (isset($_GET['buscar']) && !empty(trim($_GET['buscar']))) {
        $terminoBusqueda = trim($_GET['buscar']);
        $productos = $controller->buscar($terminoBusqueda);
        $mensaje = "Mostrando resultados para: " . htmlspecialchars($terminoBusqueda);
    } else {
        $productos = $controller->listar();
    }

    // GUARDAR O ACTUALIZAR
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = !empty($_POST['id']) ? $_POST['id'] : null;
        $nombre = trim($_POST['nombre']);
        $descripcion = trim($_POST['descripcion']);
        $existencia = (int) $_POST['existencia'];
        $precio = (float) $_POST['precio'];

        $producto = new Producto();
        $producto->setId($id);
        $producto->setNombre($nombre);
        $producto->setDescripcion($descripcion);
        $producto->setExistencia($existencia);
        $producto->setPrecio($precio);

        if ($id) {
            $controller->actualizar($producto);
            $mensaje = "Producto actualizado correctamente.";
        } else {
            $controller->crear($producto);
            $mensaje = "Producto agregado correctamente.";
        }
        // Recargar lista después de guardar
        header("Location: index.php");
        exit();
    }

} catch (Exception $e) {
    $mensaje = "Error: " . $e->getMessage();
    $productos = [];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Productos con PHP, PDO y POO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .card { border-radius: 0.5rem; box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,.075); }
        .btn-warning { color: #000; }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">CRUD de Productos con PHP, PDO y POO</h1>

        <?php if (!empty($mensaje)): ?>
            <div class="alert alert-info alert-dismissible fade show">
                <?php echo $mensaje; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <?php echo $productoEditar ? "Editar producto" : "Agregar producto"; ?>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?php echo $productoEditar['id'] ?? ''; ?>">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control"
                                   value="<?php echo htmlspecialchars($productoEditar['nombre'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Descripción</label>
                            <input type="text" name="descripcion" class="form-control"
                                   value="<?php echo htmlspecialchars($productoEditar['descripcion'] ?? ''); ?>" required>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Existencia</label>
                            <input type="number" name="existencia" class="form-control"
                                   value="<?php echo $productoEditar['existencia'] ?? ''; ?>" required>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Precio</label>
                            <input type="number" name="precio" class="form-control"
                                   value="<?php echo $productoEditar['precio'] ?? ''; ?>" step="0.01" required>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success w-100">
                                <?php echo $productoEditar ? "Actualizar" : "Guardar"; ?>
                            </button>   
                        </div>
                    </div>
                    <?php if ($productoEditar): ?>
                        <div class="mt-3">
                            <a href="index.php" class="btn btn-secondary btn-sm">Cancelar edición</a>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-dark text-white">
                Lista de productos
            </div>
            <div class="card-body">
                <form method="GET" action="" class="mb-3">
                    <div class="row g-2">
                        <div class="col">
                            <input type="text" name="buscar" class="form-control" 
                                   placeholder="Buscar por nombre o descripción" 
                                   value="<?php echo htmlspecialchars($terminoBusqueda); ?>">
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary px-4">Buscar</button>
                        </div>
                        <?php if (!empty($terminoBusqueda)): ?>
                        <div class="col-auto">
                            <a href="index.php" class="btn btn-outline-secondary">Limpiar</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </form>

                <table class="table table-bordered table-hover">
                    <thead class="table-secondary">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Existencia</th>
                            <th>Precio</th>
                            <th width="150">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($productos) > 0): ?>
                        <?php foreach ($productos as $producto): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($producto['id']); ?></td>
                                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($producto['descripcion']); ?></td>
                                <td><?php echo htmlspecialchars($producto['existencia']); ?></td>
                                <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                                <td>
                                   <a href="index.php?editar=<?php echo $producto['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                                   <a href="index.php?eliminar=<?php echo $producto['id']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('¿Seguro que deseas eliminar este producto?');">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="6" class="text-center text-muted">
                                <?php echo !empty($terminoBusqueda) ? 'No se encontraron productos.' : 'No hay productos registrados.'; ?>
                            </td></tr>
                        <?php endif; ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>