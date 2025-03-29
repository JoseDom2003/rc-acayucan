<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="../../../imagenes/logo_blanco.svg" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../css/style_register.css">
</head>
<body>
    <h1 class="text-center">EDITAR ACTA DE MATRIMONIO</h1>

    <div class="card mx-auto w-50 card-custom">
    <div class="card-header text-center" style="background-color: #611232; color: white">EDITAR ACTA DE MATRIMONIO</div>
        <div class="card-body">
            <form action = "../../../controladores/acta_matrimonio/editar_acta.php" enctype="multipart/form-data" method="POST">
                    <?php 
                        
                        include_once("../../../database/conexion.php");

                        $sql = "SELECT * FROM acta_matrimonio WHERE id_acta =".$_REQUEST['id'];
                        $resultado = $conexion->query($sql);

                        $row = $resultado->fetch_assoc();

                        ?>
<input type="hidden" class="form-control" name="id" id="id" aria-describedby="helpId" placeholder="" value="<?php echo $row['id_acta']; ?>"/>
<input type="hidden" name="old_acta_digital" value="<?php echo $row['acta_digital']; ?>">

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="tipo_acta" class="form-label">TIPO DE ACTA</label>
                    <select class="form-select" id="tipo_acta" name="tipo_acta" disabled>
                        <?php 
                            
                            include ("../../../database/conexion.php");

                            $sql = $conexion->query("SELECT * FROM tipoacta WHERE id_tipo_acta = 3");
                            while ($resultado = $sql->fetch_assoc()){
                                echo "<option value='".$resultado['id_tipo_acta']."'>".$resultado['tipo_acta']."</option>";
                            }
                            
                        ?>
                    </select>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="num_libro" class="form-label">NUMERO DE LIBRO</label>
                    <input type="text" class="form-control" name="num_libro" id="num_libro" aria-describedby="helpId" placeholder="" value="<?php echo $row['num_libro']; ?>"/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="num_acta" class="form-label">NUMERO DE ACTA</label>
                    <input type="text" class="form-control" name="num_acta" id="num_acta" aria-describedby="helpId" placeholder="" value="<?php echo $row['num_acta']; ?>"/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="fecha_registro" class="form-label">FECHA DE REGISTRO</label>
                    <input type="date" class="form-control" name="fecha_registro" id="fecha_registro" aria-describedby="helpId" placeholder="" value="<?php echo $row['fecha_registro']; ?>"/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="contrayente_masc" class="form-label">ESPOSO</label>
                    <input type="text" class="form-control" name="contrayente_masc" id="contrayente_masc" aria-describedby="helpId" placeholder="" value="<?php echo $row['contrayente_masc']; ?>"/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="contrayente_fem" class="form-label">ESPOSA</label>
                    <input type="text" class="form-control" name="contrayente_fem" id="contrayente_fem" aria-describedby="helpId" placeholder="" value="<?php echo $row['contrayente_fem']; ?>"/>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="regimen" class="form-label">REGIMEN</label>
                    <select class="form-select" id="regimen" name="regimen" value="<?php echo $row['regimen']; ?>">
                        <option value="SOCIEDAD CONYUGAL">SOCIEDAD CONYUGAL</option>
                        <option value="SEPARACION DE BIENES">SEPARACION DE BIENES</option>
                    </select>
                </div>

                <div class="form-group mb-3 d-flex flex-column">
                    <label for="acta_digital" class="form-label">ARCHIVO_ACTA</label>
                    <input type="file" class="form-control" name="acta_digital" id="acta_digital" aria-describedby="helpId" placeholder="" value="<?php echo $row['acta_digital']; ?>"/>
                    <div class="d-flex justify-content-center">
                        <embed src="../../../storage/pdfs_matrimonio/<?php echo $row['acta_digital'];?>" type="application/pdf" width="310px" height="400px"/>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-custom">Guardar cambios</button>
                    <a class="btn btn-custom" href="registros_nacimiento.php" role="button">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<br><br>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>