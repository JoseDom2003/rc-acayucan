<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar acta</title>
    <link rel="icon" href="../../../imagenes/logo_blanco.svg" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/style_register.css">
</head>
<body>
    <h1 class="text-center">EDITAR ACTA DE DIVORCIO</h1>

    <div class="card mx-auto w-50 card-custom">
    <div class="card-header text-center" style="background-color: #611232; color: white">EDITAR ACTA DE DIVORCIO</div>
        <div class="card-body">
            <form action="../../../controladores/acta_divorcio/editar_acta.php" enctype="multipart/form-data" method="POST">
                <?php 
                    include_once("../../../database/conexion.php");

                    $sql = "SELECT * FROM acta_divorcio WHERE id_acta =".$_REQUEST['id'];
                    $resultado = $conexion->query($sql);

                    $row = $resultado->fetch_assoc();
                ?>
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $row['id_acta']; ?>"/>
                <input type="hidden" name="old_acta_digital" value="<?php echo $row['acta_digital']; ?>">

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="tipo_acta" class="form-label">TIPO DE ACTA</label>
                    <select class="form-select" id="tipo_acta" name="tipo_acta" disabled>
                        <?php 
                            $sql = $conexion->query("SELECT * FROM tipoacta WHERE id_tipo_acta = 4");
                            while ($resultado = $sql->fetch_assoc()){
                                echo "<option value='".$resultado['id_tipo_acta']."'>".$resultado['tipo_acta']."</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="num_libro" class="form-label">NUMERO DE LIBRO</label>
                    <input type="text" class="form-control" name="num_libro" id="num_libro" value="<?php echo $row['num_libro']; ?>"/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="num_acta" class="form-label">NUMERO DE ACTA</label>
                    <input type="text" class="form-control" name="num_acta" id="num_acta" value="<?php echo $row['num_acta']; ?>"/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="nombre_divorciado1" class="form-label">NOMBRE DIVORCIADO</label>
                    <input type="text" class="form-control" name="nombre_divorciado1" id="nombre_divorciado1" value="<?php echo $row['nombre_divorciado1']; ?>"/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="nombre_divorciado2" class="form-label">NOMBRE DIVORCIADA</label>
                    <input type="text" class="form-control" name="nombre_divorciado2" id="nombre_divorciado2" value="<?php echo $row['nombre_divorciado2']; ?>"/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="fecha_divorcio" class="form-label">FECHA DE DIVORCIO</label>
                    <input type="date" class="form-control" name="fecha_divorcio" id="fecha_divorcio" value="<?php echo $row['fecha_divorcio']; ?>"/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="disolucion" class="form-label">DISOLUCION</label>
                    <input type="text" class="form-control" name="disolucion" id="disolucion" value="<?php echo $row['disolucion']; ?>"/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="acta_digital" class="form-label">ARCHIVO_ACTA</label>
                    <input type="file" class="form-control" name="acta_digital" id="acta_digital"/>
                    <div class="d-flex justify-content-center">
                        <embed src="../../../storage/pdfs_divorcio/<?php echo $row['acta_digital'];?>" type="application/pdf" width="310px" height="400px"/>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-custom">Guardar cambios</button>
                    <a class="btn btn-custom" href="registros_divorcio.php" role="button">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<br><br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>