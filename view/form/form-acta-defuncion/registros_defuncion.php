<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="../../../imagenes/logo_blanco.svg" >
    <link rel="stylesheet" href="../../../css/style_register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../home.php"><img src="../../../imagenes/logo2 copy.png" alt="" width="80px" height="60px"></a>
            <a class="navbar-brand" href="../../home.php">INICIO</a>
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
                        <li><a class="dropdown-item" href="../../../index.php">Cerrar sesion</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>
    <div class="container-tittle">
        <h1 class="text-center">REGISTRO ACTAS DE DEFUNCION</h1>
    </div>
<br>
    <div class="container-table p-3 table-responsive">

        <div class="container-agregar pb-2">
            <a href="form_defuncion.php" class="btn btn-success"><img src="../../../imagenes/imagen_agregar.png" alt="" width="35px" height="26px" style="padding-right: 10px;">AGREGAR REGISTRO</a>
        </div>

        <table class="table table-bordered table-striped table-hover" id="myTable"> 
            <thead class="table-secondary">
                <tr class="text-center">
                    <th scope="col">TIPO DE ACTA</th>
                    <th scope="col">NUMERO DE LIBRO</th>
                    <th scope="col">NUMERO DE ACTA</th>
                    <th scope="col">FECHA DE REGISTRO</th>
                    <th scope="col">NOMBRE OCSISO</th>
                    <th scope="col">HORA DE LA MUERTE</th>
                    <th scope="col">FECHA DE LA MUERTE</th>
                    <th scope="col">LUGAR DE LA MUERTE</th>
                    <th scope="col">ACTA</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    require ("../../../database/conexion.php");
                    
                    $sql = $conexion->query("SELECT * FROM acta_defuncion 
                    INNER JOIN tipoacta ON acta_defuncion.id_tipo_acta = tipoacta.id_tipo_acta");            

                    while($resultado = $sql->fetch_assoc()){
                ?>

                <tr class="text-center">
                    <th scope="row"><?php echo $resultado["tipo_acta"];?></th>
                    <th scope="row"><?php echo $resultado["num_libro"];?></th>
                    <th scope="row"><?php echo $resultado["num_acta"];?></th>
                    <th scope="row"><?php echo $resultado["fecha_registro"];?></th>
                    <th scope="row"><?php echo $resultado["nombre_difunto"];?></th>
                    <th scope="row"><?php echo $resultado["hora_defuncion"];?></th>
                    <th scope="row"><?php echo $resultado["fecha_defuncion"];?></th>
                    <th scope="row"><?php echo $resultado["lugar_defuncion"];?></th>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm view-pdf" 
                            data-bs-toggle="modal" data-bs-target="#pdfModal" 
                            data-file="<?php echo htmlspecialchars($resultado['acta_digital']); ?>">
                        Ver PDF
                        </button>
                    </td>  
                    <th>           
                        <a href="form_editar_acta.php?id=<?php echo $resultado['id_acta'];?>" class="btn btn-warning"><img src="../../../imagenes/imagen_editar.png" alt="" width="30px" height="25px" style="padding-right: 5px;">EDITAR</a>
                        <br><br>
                        <a href="../../../controladores/acta_defuncion/eliminar_acta.php?id=<?php echo $resultado['id_acta'];?>" class="btn btn-danger btn-eliminar"><img src="../../../imagenes/imagen_borrar.png" alt="" width="30px" height="25px" style="padding-right: 5px;">ELIMINAR</a>
                    </th>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

<!-- Modal para visualizar el PDF -->
<div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="pdfModalLabel">Visualizar PDF</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <iframe id="pdfIframe" src="../../../../storage/pdfs_defuncion/" frameborder="0" style="width: 100%; height: 75vh;"></iframe>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  var pdfModal = document.getElementById("pdfModal");
  pdfModal.addEventListener("show.bs.modal", function (event) {
    var button = event.relatedTarget;
    var file = button.getAttribute("data-file");
    // Se asume que los archivos PDF están en la carpeta "../../../storage/"
    var fullPath = "../../../storage/pdfs_defuncion/" + file;
    document.getElementById("pdfIframe").src = fullPath;
  });
  pdfModal.addEventListener("hidden.bs.modal", function () {
    document.getElementById("pdfIframe").src = "";
  });
});
</script>


<!-- CDN PARA LA PAGINA -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.4/js/responsive.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- ARCHIVOS JS PARA SWEET ALERT -->
<script>
    const table = new DataTable('#myTable', {
        responsive: true,
        fixedHeader: true,
        columnDefs: [
            { responsivePriority: 1, targets: 4 },
            { responsivePriority: 2, targets: 0 },
            { responsivePriority: 3, targets: 8 },
            { className: "dt-center", targets: "_all" }
        ],
        layout: {
            topStart: {
                pageLength: {
                    menu: [10, 20, 30, 40, 50]
                }
            },
            bottomStart: {
                paging: {
                    numbers: 10
                }
            },
            topEnd: {},
            bottomEnd: {}
        },
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json",
            entries: {
                _: 'Actas',
                1: 'Acta'
            }
        }
    });

</script>
<script src="../../../js/eliminar_sweetalert.js"></script>
<script src="../../../js/alert_registro.js"></script>
<script src="../../../js/editar_registro.js"></script>

</body>
</html>