<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar acta</title>
    <link rel="icon" href="../../../imagenes/logo_blanco.svg" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/style_register.css">
</head>
<body>
    
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

<div class="card mx-auto w-50 card-custom">
    <div class="card-header text-center" style="background-color: #611232; color: white">INGRESAR ACTA DE NACIMIENTO</div>
        <div class="card-body">
            <form action="../../../controladores/acta_nacimiento/insertar_acta.php" enctype="multipart/form-data" method="POST">
                
                <div class="form-group mb-3 d-flex flex-column">
                    <label for="tipo_acta" class="form-label">TIPO DE ACTA</label>
                    <select class="form-select" id="tipo_acta" name="tipo_acta">

                        <?php 
                        
                        include ("../../../database/conexion.php");

                        $sql = $conexion->query("SELECT * FROM tipoacta WHERE id_tipo_acta = 1");
                        while ($resultado = $sql->fetch_assoc()){
                            echo "<option value='".$resultado['id_tipo_acta']."'>".$resultado['tipo_acta']."</option>";
                        }
                        
                        ?>

                    </select>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="num_libro" class="form-label">NUMERO DE LIBRO</label>
                    <input type="text" class="form-control" name="num_libro" id="num_libro" aria-describedby="helpId" placeholder="" required/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="num_acta" class="form-label">NUMERO DE ACTA</label>
                    <input type="text" class="form-control" name="num_acta" id="num_acta" aria-describedby="helpId" placeholder="" required/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="fecha_registro" class="form-label">FECHA DE REGISTRO</label>
                    <input type="date" class="form-control" name="fecha_registro" id="fecha_registro" aria-describedby="helpId" placeholder="" required/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="curp" class="form-label">CURP</label>
                    <input type="text" class="form-control" name="curp" id="curp" aria-describedby="helpId" placeholder="" required/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="nombre" class="form-label">NOMBRE</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" required/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="paterno" class="form-label">PATERNO</label>
                    <input type="text" class="form-control" name="paterno" id="paterno" aria-describedby="helpId" placeholder="" required/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="materno" class="form-label">MATERNO</label>
                    <input type="text" class="form-control" name="materno" id="materno" aria-describedby="helpId" placeholder="" required/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="fecha_nacimiento" class="form-label">FECHA DE NACIMIENTO</label>
                    <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" aria-describedby="helpId" placeholder="Colocar el nombre de ambos padres" required/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="lugar_nacimiento" class="form-label">LUGAR DE NACIMIENTO</label>
                    <input type="text" class="form-control" name="lugar_nacimiento" id="lugar_nacimiento" aria-describedby="helpId" placeholder="" required/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="nombre_padres" class="form-label">NOMBRE PADRE(S)</label>
                    <input type="text" class="form-control" name="nombre_padres" id="nombre_padres" aria-describedby="helpId" placeholder="" required/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="acta_digital" class="form-label">ARCHIVO_ACTA</label>
                    <input type="file" class="form-control" name="acta_digital" id="acta_digital" aria-describedby="helpId" placeholder=""/>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-custom">Agregar</button>
                    <a class="btn btn-custom" href="registros_nacimiento.php" role="button">Cancelar</a>
                    <a class="btn btn-custom" href="../../home.php" role="button">Volver al inicio</a>
                </div>
            </form>
        </div>
    </div>
</div>
<br><br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    const fileInput = document.getElementById("acta_digital");
    const viewButton = document.getElementById("viewButton");
    const pdfPreview = document.getElementById("pdfPreview");

    fileInput.addEventListener("change", function(e) {
      const file = e.target.files[0];
      if(file && file.type === "application/pdf") {
        // Crea un URL temporal para el archivo
        const fileURL = URL.createObjectURL(file);
        pdfPreview.src = fileURL;
        viewButton.disabled = false;
      } else {
        pdfPreview.src = "";
        viewButton.disabled = true;
      }
    });
  </script>
</body>
</html>