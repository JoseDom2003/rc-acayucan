<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="icon" href="/imagenes/logo_blanco.svg" >
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
<header>

    <div class="top-page">
        <img src="./imagenes/logo1.png" alt="...">
        <img src="./imagenes/logo2.png" alt="...">
    </div>

    <div class="tittle">
        <h1>RC ACAYUCAN</h1>
    </div>

</header>

<div class="container-login">
    <div class="login-box">
        <div class="card">

            <div class="card-header custom-header">
                Iniciar sesión
            </div>

            <div class="card-body">
                <form action="" method="post" id="login-form">
                    <div class="form-floating">
                        <input type="text" class="form-control" placeholder="name@example.com" name="username" id="floatingInput" />
                        <label for="floatingInput">Ingresa tu usuario</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control" placeholder="Password" name="password" id="floatingPassword" />
                        <label for="floatingPassword">Ingresa tu contraseña</label>
                    </div>
    
                    <a href="./view/home.php" class="btn btn-custom mb-3">Ingresar</a>

                    <div class="card-footer text-center text-muted">
                        <small>No tienes una cuenta <a href="/login/form_login.php" style="color: #611232;">Crea una aqui</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>