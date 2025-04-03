<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <!-- Enlace al CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Enlace a la hoja de estilos personalizada -->
    <link href="../css/style_login.css" rel="stylesheet">
</head>

<header>

    <div class="top-page">
        <img src="../imagenes/logo1.png" alt="...">
        <img src="../imagenes/logo2.png" alt="...">
    </div>

    <div class="tittle">
        <h1 style="font-weight: bold;">RC ACAYUCAN</h1>
    </div>

</header>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center text-white">
                        <h2>Registro de Usuario</h2>
                    </div>
                    <div class="card-body">
                        <form action="guardar_usuario.php" method="POST">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nombre de Usuario</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="role_id" class="form-label">Rol</label>
                                <select class="form-select" id="role_id" name="role_id" required>
                                    <option value="">Seleccione un rol</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Usuario</option>
                                </select>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-custom">Registrar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center text-muted">
                        <small>¿Ya tienes una cuenta? <a href="../index.php" style="color: #611232;">Inicia sesión aquí</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script de Bootstrap 5 -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
