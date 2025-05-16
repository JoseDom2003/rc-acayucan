<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>HOME</title>
    <link rel="icon" href="../imagenes/logo_blanco.svg" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles_home.css">
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href=""><img src="./../imagenes/logo2 copy.png" alt="" width="80px" height="60px"></a>
            <a class="navbar-brand" href="">INICIO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @USER
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="../index.php">Cerrar sesion</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main>
    <div class="container-main">
        <div class="row-custom d-flex flex-wrap justify-content-center align-items-center">
    
            <div class="col-lg-4 col-12 text-center col-custom">
                <img src="../imagenes/insert.png" alt="Placeholder" width="100" height="100">
                <h2 class="fw-normal">ADMINISTRAR ACTAS</h2>
                <p>Este módulo permite gestionar actas de manera eficiente, ofreciendo funciones para insertar nuevas actas, 
                    editar las existentes y eliminarlas según sea necesario.​</p>
                <p><a class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#exampleModal">Ingresar &raquo;</a></p>
            </div>

            <div class="col-lg-4 col-12 text-center col-custom">
                <img src="../imagenes/busqueda.png" alt="Placeholder" width="100" height="100">
                <h2 class="fw-normal">BUSQUEDA DE ACTAS</h2>
                <p>Proporciona herramientas avanzadas para localizar actas específicas utilizando diversos filtros, 
                    facilitando la consulta rápida y precisa de la información requerida.</p>
                <p><a class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#exampleModal2">Ingresar &raquo;</a></p>
            </div>
        </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header justify-content-between align-items-center">
                    <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Selecciona el tipo de acta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <a type="button" class="btn btn-custom w-100 mb-3" href="./form/form-acta-nacimiento/registros_nacimiento.php">Acta de Nacimiento</a>
                    <a type="button" class="btn btn-custom w-100 mb-3" href="./form/form-acta-defuncion/registros_defuncion.php">Acta de Defunción</a>
                    <a type="button" class="btn btn-custom w-100 mb-3" href="./form/form-acta-matrimonio/registros_matrimonio.php">Acta de Matrimonio</a>
                    <a type="button" class="btn btn-custom w-100" href="./form/form-acta-divorcio/registros_divorcio.php">Acta de Divorcio</a>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-cerrar text-white" data-bs-dismiss="modal">Cerrar</button>
                </div>
             </div>
        </div>
    </div>


    <!--- MODAL 2 --->
    <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header justify-content-between align-items-center">
                    <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Selecciona el tipo de acta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <a type="button" class="btn btn-custom w-100 mb-3" href="../view/form/form-acta-nacimiento/busqueda_acta.php">Acta de Nacimiento</a>
                    <a type="button" class="btn btn-custom w-100 mb-3" href="../view/form/form-acta-defuncion/busqueda_acta.php">Acta de Defunción</a>
                    <a type="button" class="btn btn-custom w-100 mb-3" href="../view/form/form-acta-matrimonio/busqueda_acta.php">Acta de Matrimonio</a>
                    <a type="button" class="btn btn-custom w-100" href="../view/form/form-acta-divorcio/busqueda_acta.php">Acta de Divorcio</a>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-cerrar text-white" data-bs-dismiss="modal">Cerrar</button>
                </div>
             </div>
        </div>
    </div>

    </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>